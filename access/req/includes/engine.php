<?php
	error_reporting(E_ALL);
	
	class CScript
	{
		// Session Data
		private $m_Script = array(), $m_SQLCon = FALSE, $m_Lang = "en", $m_ScriptLang = array();
		
		/*
		 Result: void
		 Description: Will output a Debug Message when _DEBUG_ is defined
		*/
		private function Dbg($msg)
		{
			if(DEFINED("_DEBUG_"))
				echo "<b>Debug Message:</b> ".$msg."<br>\n";
		}
		
		/*
		 Result: void
		 Description: Will output a Error Message when _ERROR_ is defined
		*/
		private function Err($type, $error = "", $description = "")
		{
			if(!DEFINED("_ERROR_") || empty($type))
				return;
			
			if(!empty($error))
				echo "<b>".$type.":</b> ".$error."<br>\n";
				
			if(!empty($description))
				echo "<b>Description:</b> ".$description."<br>\n";
		}
		
		
		/*
		 Result: string
		 Description: Will return the string to given language describer.
		*/
		private function L($key)
		{
			return $this->m_ScriptLang[$this->m_Lang][$key];
		}
		
		/*
		 Result: Resource
		 Description: Return active MySQL Connection.
		*/
		public function GetSQL()
		{
			return $this->m_SQLCon;
		}
		
		/*
		 Result: void
		 Description: Will initialize the session and assign current state.
		*/
		public function Init($sqlhost, $sqluser, $sqlpass, $sqldb)
		{
			// Begin Session.
			session_start();
			
			// Connect to MySQL and Select Database
			$this->m_SQLCon = @mysql_connect($sqlhost, $sqluser, $sqlpass);
			if($this->m_SQLCon === FALSE)
				$this->Err("MySQL Error", "Unable to connect Host.", mysql_error());
			
			if( !@mysql_select_db($sqldb, $this->m_SQLCon) )
				$this->Err("MySQL Error", "Unable to select Database.", mysql_error());
			
			// Determine if this User is in the middle of the progress.
			if(isset($_SESSION['script']))
			{
				$this->m_Script = $_SESSION['script'];
			}
			else
			{
				$this->m_Script['user'] = array();
				$_SESSION['script'] = $this->m_Script;
			}
			
			// Query Language Information.
			$result_lang = mysql_query("SELECT * FROM `config` WHERE `name` = 'language';", $this->m_SQLCon);
			if(!$result_lang)
			{
				$this->Err("Script Error", "Unable to choose language.", mysql_error());
			}
			else
			{
				$lang_row = mysql_fetch_assoc($result_lang);
				$this->m_Lang = $lang_row['value'];
				mysql_free_result($result_lang);
			}	
			
			// Language File.
			include("language/lang_".$this->m_Lang.".php");
			$this->m_ScriptLang = $script_lang;
			
			// Set proper Session.
			$this->SaveSession();
		}
		
		/*
		 Result: void
		 Description: Will process the Data the person submitted and will assign a new Question and score. 
		*/
		public function Destroy()
		{
			if($this->m_SQLCon !== FALSE)
				mysql_close($this->m_SQLCon);
		}
		
		/*
		 Result: void
		 Description: Will process the Data the person submitted and will assign a new Question and score. 
		*/
		private function SaveSession()
		{
			$_SESSION['script'] = $this->m_Script;
		}
		
		/*
		 Result: array or FALSE
		 Description: Will attempt to create a user, on success return User Informations.
		*/
		public function CreateUser($username, $password, $email, $firstname, $lastname, $admin = FALSE, $validation = TRUE, &$error = "")
		{
		
			// Fixes the strings for preventation of SQL Injections.
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$email = mysql_real_escape_string($email);
			$firstname = mysql_real_escape_string($firstname);
			$lastname = mysql_real_escape_string($lastname);
			
			// Validate Data.
			if(empty($username))
			{
				$error = $this->L("usernotgiven"); return FALSE;
			}
			elseif(empty($password))
			{
				$error = $this->L("passnotgiven"); return FALSE;
			}
			elseif(empty($email))
			{
				$error = $this->L("emailnotgiven"); return FALSE;
			}
			elseif(empty($firstname))
			{
				$error = $this->L("fnamenotgiven"); return FALSE;
			}
			elseif(empty($lastname))
			{
				$error = $this->L("lnamenotgiven"); return FALSE;
			}
			
			// Check if User already exists.
			$result_usercheck = mysql_query("SELECT * FROM `members` WHERE `user` = '".$username."' OR `email` = '".$email."';", $this->m_SQLCon);
			if(!$result_usercheck)
			{
				$this->Err("MySQL Error", "Unable to check if user exists.", mysql_error());
				return FALSE;
			}
			else
			{
				// Ensure theres no person with same E-Mail or Username
				if(mysql_num_rows($result_usercheck) > 0)
				{
					mysql_free_result($result_usercheck);
					$error = $this->L("usertaken");
					return FALSE;
				}
			}
			
			// Get Entry ready.
			$validation_key = $validation == TRUE ? md5(uniqid(rand(), true)) : "";
			$regip = $_SERVER['REMOTE_ADDR'];
			$md5pass = md5($password);
			
			// Insert Entry.
			$query_insertuser = sprintf("INSERT INTO `members` (`user`, `pass`, `email`, `fname`, `lname`, `regip`, `regkey`, `admin`)".
				" VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
				$username, $md5pass, $email, $firstname, $lastname, $regip, $validation_key, (int)$admin);
				
			$this->Dbg($query_insertuser);
			
			// Fetch User Data.
			$result_insertuser = mysql_query($query_insertuser, $this->m_SQLCon);
			if(!$result_insertuser)
			{
				$this->Err("MySQL Error", "Unable to insert User into Database", mysql_error());
			}
			else
			{
				// Return an Array.
				$userinfo = array("username" => $username, "password" => $md5pass, "id" => 0, "validations_key" => $validation_key);
				
				// Get User ID.
				$result_userquery = mysql_query("SELECT * FROM `members` WHERE `regkey` = '".$validation_key."';", $this->m_SQLCon);
				if($result_userquery)
				{
					$row_userquery = mysql_fetch_assoc($result_userquery);
					$userinfo['id'] = (int)$row_userquery['id'];
				}
				mysql_free_result($result_userquery);
				
				return $userinfo;
			}
		}
		
		/*
		 Result: BOOL
		 Description: Will Validate the User if Validations Key is correct.
		*/
		public function ValidateUser($userid, $validations_key)
		{
			$userid = (int)$userid;
			
			$result_userquery = mysql_query("SELECT * FROM `members` WHERE `id` = '".$userid."' AND `regkey` = '".$validations_key."';", $this->m_SQLCon);
			if(!$result_userquery)
			{
				$this->Err("MySQL Error", "Unable to Validate User.", mysql_error());
				return FALSE;
			}
			
			if(mysql_num_rows($result_userquery) > 0)
			{
				mysql_free_result($result_userquery);
				
				$result_userupdate = mysql_query("UPDATE `members` SET `regkey` = '' WHERE `id` = '".$userid."';", $this->m_SQLCon);
				if(!$result_userupdate)
				{
					$this->Err("MySQL Error", "Unable to Validate User.", mysql_error());
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			}
			
			return FALSE;
		}
		
		/*
		 Result: BOOL
		 Description: Will Send the Password for the User lost / forgot password.
		*/
		public function ForgotPass($username,$email,$pass)
		{
			
			$result_userquery = mysql_query("SELECT * FROM `members` WHERE `email` = '".$email."' AND `user` = '".$username."';", $this->m_SQLCon);

			if(!$result_userquery)
			{
				$this->Err("MySQL Error", "Unable to Retreieve User Password now as we did not find account info with that email and username combination.", mysql_error());
				return FALSE;
			}
			
			$md5pass = md5($pass);
			
			if(mysql_num_rows($result_userquery) > 0)
			{
				mysql_free_result($result_userquery);
				
				$result_userupdate = mysql_query("UPDATE `members` SET `pass` = '$md5pass' WHERE `email` = '".$email."';", $this->m_SQLCon);

				if(!$result_userupdate)
				{
					$this->Err("MySQL Error", "Unable to Retreieve User Password now due to a technical error.", mysql_error());
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			}
			
			return FALSE;
		}
		
		/*
		 Result: array or FALSE
		 Description: Will attempt to Login to the User and return user Informations.
		*/
		public function Login($username, $password)
		{
			// Fixes the strings for preventation of SQL Injections.
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			
			// Prepare Login
			$md5pass = md5($password);
			
			$result_login = mysql_query("SELECT * FROM `members` WHERE `user` = '".$username."' AND `regkey` = '';", $this->m_SQLCon);
			if(!$result_login)
			{
				$this->Err("MySQL Error", "Unable to Login", mysql_error());
				return FALSE;
			}
			
			if(mysql_num_rows($result_login) == 0)
			{
				$this->Dbg("0 Users found");
				return FALSE;
			}
			
			$row_user = mysql_fetch_assoc($result_login);
			if($row_user['pass'] != $md5pass)
			{
				$this->Dbg("Password does not Match -> ".$row_user['pass']." - ".$md5pass);
				return FALSE;
			}
			mysql_free_result($result_login);
			
			$this->m_Script['user']['login'] = TRUE;
			$this->m_Script['user']['data'] = $row_user;
			$this->m_Script['user']['admin'] = (BOOL)$row_user['admin'];
			$this->SaveSession();
			
			return $row_user;
		}
		
		
		public function Logout()
		{
			$this->m_Script['user'] = FALSE;
			$this->m_Script['user']['login'] = FALSE;
			$this->SaveSession();
		}
		
		/*
		 Result: BOOL
		 Description: Will check if an existing valid Session is active.
		*/
		public function IsLoggedIn()
		{
			if( !isset($this->m_Script['user']) )
				return FALSE;
				
			if( isset($this->m_Script['user']['login']) && $this->m_Script['user']['login'] == TRUE)
			{
				$this->Dbg("User has a login session.");
				
				$user = $this->m_Script['user']['data']['id'];
				$pass = $this->m_Script['user']['data']['pass'];
				$result_loginverify = mysql_query("SELECT * FROM `members` WHERE `id` = '".$user."' AND `pass` = '".$pass."';", $this->m_SQLCon);
				if(!$result_loginverify)
				{
					$this->Err("MySQL Error", "Unable to verify Login Session.", mysql_error());
				}
				else
				{
					if(mysql_num_rows($result_loginverify) == 0)
					{
						$this->m_Script['user']['admin'] = FALSE;
						$this->m_Script['user']['login'] = FALSE;
						$this->Dbg("Password did not match from this Session to Database entry.");
						$this->SaveSession();
					}
					else
					{
						$row_user = mysql_fetch_assoc($result_loginverify);
						$this->m_Script['user']['admin'] = (BOOL)$row_user['admin'];
						$this->Dbg("Login Session verified");
						mysql_free_result($result_loginverify);
						return TRUE;
					}
				}
			}
			return FALSE;
		}
		
		/*
		 Result: BOOL, Array
		 Description: Get available User Data if logged in.
		*/
		public function GetSessionData()
		{
			if( !isset($this->m_Script['user']) )
				return FALSE;
				
			return $this->m_Script['user'];
		}
	
		/*
		 Result: BOOL
		 Description: Get Members into array.
		*/
		public function GetMembers(&$data, &$count = 0, $maxlimit = -1)
		{
			$data = array();
			$count = 0;
				
			if($maxlimit == -1)
				$query = "SELECT * FROM `members`;";
			else
				$query = "SELECT * FROM `members` LIMIT 0 , ".(int)$maxlimit.";";
				
			$result_members = mysql_query($query, $this->m_SQLCon);
			if(!$result_members)
			{
				$this->Err("MySQL Error", "Unable to fetch members.", mysql_error());
				return FALSE;
			}
			while( ($row_member = mysql_fetch_assoc($result_members)) )
			{
				$count++;
				$data[] = $row_member;
			}
			
			return TRUE;
		}	
	}
?>