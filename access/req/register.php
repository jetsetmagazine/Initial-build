<?php
ob_start();
?>
<SCRIPT> 

function validate_email(field,alerttxt)
{
with (field)
{
apos=value.indexOf("@");
dotpos=value.lastIndexOf(".");
if (apos<1||dotpos-apos<2) 
  {alert(alerttxt);return false;}
else {return true;}
}
}

function validate_form(thisform)
{
with (thisform)
{
if (validate_email(email,"Enter a valid e-mail address!")==false)
  {email.focus();return false;}
}
}


function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
        ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 65 || charCode > 90) && 
        (charCode < 97 || charCode > 122)) {
        alert("Enter letters only.");
        return false;
    }
    return true;
}
</SCRIPT>
<?php
	include("common.php");
	include("header.php");
	
	function ShowRegister($errstr = "")
	{
		echo "<center>\n";
		if( !empty($errstr) )
			echo "<b>Error:</b> ".$errstr."<br><br>\n";
		else
			echo "<b>Fields marked with * are required</b><br><br>\n";
			
		echo "<form method=\"post\" action=\"register.php\" onsubmit=\"return validate_form(this);\"
>\n";
		echo "<table border=\"0\" width=\"300\" cellpadding=\"3\" cellspacing=\"3\">\n";
		echo "	<tr>\n";
		echo "		<td>Username *:</td>\n";
		echo "		<td><input type=\"text\" name=\"user\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Password *:</td>\n";
		echo "		<td><input type=\"password\" name=\"pass\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>E-Mail *:</td>\n";
		echo "		<td><input type=\"text\" name=\"email\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>First Name *:</td>\n";
		echo "		<td><input type=\"text\" name=\"fname\" onkeypress=\"return lettersOnly(event)\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Last Name *:</td>\n";
		echo "		<td><input type=\"text\" name=\"lname\" onkeypress=\"return lettersOnly(event)\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td></td>\n";
		echo "		<td><input type=\"submit\" name=\"register\" value=\"Register\"></td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
		echo "</form>\n";
		echo "</center>\n";
	}
	
	if(isset($_GET['key']) && isset($_GET['id']))
	{
		$key = mysql_real_escape_string($_GET['key']);
		$id = (int)$_GET['id'];		

		if($script->ValidateUser($id, $key) === TRUE)
		{
			echo "<meta http-equiv=\"refresh\" content=\"5; url=./members\">\n";		
			echo "<center>Thank You, you can now Login to your account.<br>Redirecting in 5 seconds.</center>";
		}
		else
		{
			echo "<center>The activiation code is not correct.<br>Please try again.</center>";
		}
	}
	else
	{		
		if(!isset($_POST['register']))
		{
			ShowRegister();
		}
		else
		{
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			$userinfo = $script->CreateUser($user, $pass, $email, $fname, $lname, FALSE, TRUE, $errstr);
			if($userinfo === FALSE)
			{
				ShowRegister($errstr);
			}
			else
			{
				if(!DEFINED("_VALIDATION_"))
					$script->ValidateUser($userinfo['id'], $userinfo['validations_key']);
					
				$script->Login($user, $pass);
				
				$mailtext = "";
				$mailtext = "Hello ".$user."\n\n";
				$mailtext .= "Thank you for Registering.You have submitted these details\n\n";
								
				if(DEFINED("_VALIDATION_"))
				$mailtext .= "Click the url to validate your registration: "._VALIDATEURL_."/register.php?key=".$userinfo['validations_key']."&id=".$userinfo['id']." \n\n";
				
				$mailtext .= "If you have not registered yourself, please do not click the validate link and instead reply to this mail with UNSUBSCRIBE in subject. Thank you and have a great day.\n";
				
				$header = 'From: noreply@newgenerationservices.in' . "\r\n" .
					'Reply-To: raghu@freedb.in' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				mail($email, "Please activate your account!", $mailtext, $header);
		
				echo "<br><br>\n";
				
				if(!DEFINED("_VALIDATION_"))
				{
					echo "<meta http-equiv=\"refresh\" content=\"5; url=./members\">\n";				
					echo "<center><br>You are now registered and logged in.</br>Redirecting in 5 seconds.</center>\n";
				}
				else
				{
					echo "<center><br>You are now registered, an E-Mail has been sent with an validation link. <br>You can not login before you activate your account by clicking the link in the E-Mail.\n";
				}
			}
		}
	}
	
	include("footer.php");
	$script->Destroy();
	ob_flush();
?>