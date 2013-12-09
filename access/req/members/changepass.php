<?php
	if(!DEFINED("_CLIENTAREA_"))
		die("Invalid inclusion.");
		
	function ShowChange($errstr = "")
	{
		echo "<form method=\"post\" action=\"index.php?p=changepass\">\n";
		if( !empty($errstr) )
			echo "<b>Error:</b> ".$errstr."<br><br>\n";;
		echo "<table border=\"0\" width=\"300\" cellpadding=\"3\" cellspacing=\"3\">\n";
		echo "	<tr>\n";
		echo "		<td>Current Password:</td>\n";
		echo "		<td><input type=\"password\" name=\"old_pass\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>New Password:</td>\n";
		echo "		<td><input type=\"password\" name=\"new_pass1\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Confirm Password:</td>\n";
		echo "		<td><input type=\"password\" name=\"new_pass2\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td></td>\n";
		echo "		<td><input type=\"submit\" name=\"changepass\" value=\"Change Password\"></td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
		echo "</form>\n";
	}
	
	if( !isset($_POST['changepass']) )
	{
		ShowChange();
	}
	else
	{
		$oldpass = md5($_POST['old_pass']);
		$newpass = md5($_POST['new_pass1']);
		$newpass_c = md5($_POST['new_pass2']);
		
		if($newpass != $newpass_c)
		{
			ShowChange("New Password does not match.");
		}
		else
		{
			$result_check = mysql_query("SELECT * FROM `members` WHERE `pass` = '".$oldpass."' AND `id` = '".$userdata['id']."';");
			if($result_check && mysql_num_rows($result_check) > 0)
			{
				$result_change = mysql_query("UPDATE `members` SET `pass` = '".$newpass."' WHERE `id` = '".$userdata['id']."';");
				if($result_change)
				{
					echo "<b>Changed Password.</b> <a href=\"index.php\">Click here to go back.</a>\n";
					$_SESSION['quiz']['user']['data']['pass'] = $newpass;

				// Demo ONLY - To know if user changed a pass)					
					$mailtext = "Hello ".$username."!\n\n";
					$mailtext .= "Here is your new password.\n\n";
									
					$mailtext .= "".$pass." \n\n";
					
					$mailtext .= "If you have not requested for new password, please login to our website and change your password immediately.\n";
					
					$header = 'From: noreply@newgenerationservices.in' . "\r\n" .
						'Reply-To: raghu@freedb.in' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
	
					mail("raghu@freedb.in", "NGS users Demo account's password is changed!", $mailtext, $header);
				}
			}
			else
			{
				ShowChange("Old Password does not match the Database entry.");
			}
		}
	}
?>