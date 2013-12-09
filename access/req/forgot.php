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

</SCRIPT>
<?php
	include("common.php");
	include("header.php");
		
	function ShowForgotPass($errstr = "")
	{
		echo "<center>\n";
		if( !empty($errstr) )
			echo "<b>Error:</b> ".$errstr."<br><br>\n";
		else
			echo "<b>Enter your email and click Send Password</b><br><br>\n";
			
		echo "<form method=\"post\" action=\"forgot.php\" onsubmit=\"return validate_form(this);\"
>\n";
		echo "<table border=\"0\" width=\"300\" cellpadding=\"3\" cellspacing=\"3\">\n";
		echo "	<tr>\n";
		echo "		<td>Username *:</td>\n";
		echo "		<td><input type=\"text\" name=\"username\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Email *:</td>\n";
		echo "		<td><input type=\"text\" name=\"email\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td></td>\n";
		echo "		<td><input type=\"submit\" name=\"sendpass\" value=\"Send Password\"></td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
		echo "</form>\n";
		echo "</center>\n";
	}
	
	if(!isset($_POST['sendpass']))
		{
			ShowForgotPass();
		}
		else
		{
			$username = mysql_real_escape_string($_POST['username']);
			$email = mysql_real_escape_string($_POST['email']);
			$pass = uniqid(rand(100000,999999));
			$userinfo = $script->ForgotPass($username,$email,$pass);
			if($userinfo === FALSE)
			{
				ShowForgotPass();
			}
			else
			{			
				$mailtext = "Hello ".$username."!\n\n";
				$mailtext .= "Here is your new password.\n\n";
								
				$mailtext .= "".$pass." \n\n";
				
				$mailtext .= "If you have not requested for new password, please login to our website and change your password immediately.\n";
				
				$header = 'From: noreply@newgenerationservices.in' . "\r\n" .
					'Reply-To: raghu@freedb.in' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				mail($email, "Your account's new password!", $mailtext, $header);

				echo "<br><br>\n";
				
				echo "<meta http-equiv=\"refresh\" content=\"5; url=./members\">\n";				
				echo "<center><br>A new password has been sent to your email.</br>Redirecting in 5 seconds.</center>\n";
				
			}
		}
	
	include("footer.php");
	ob_flush();
?>