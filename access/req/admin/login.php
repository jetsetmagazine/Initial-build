<?php

	if(!DEFINED("_WORKSPACE_"))
		die("Invalid Inclusion");
		
	function ShowLogin($error = "")
	{
		echo "<center>\n";
		echo "<form method=\"post\" action=\"index.php\">\n";
		
		if( empty($error) )
			echo "<b>You must login before you can continue.</b><br><br>\n";
		else
			echo "<font color=\"#FF0000\"><b>".$error."</b></font><br><br>\n";
			
		echo "Username: <input type=\"text\" name=\"login_user\"><br>\n";
		echo "Password: <input type=\"text\" name=\"login_pass\"><br>\n";
		echo "<input type=\"submit\" name=\"login_submit\" value=\"Login\">\n";
		echo "</form>\n";
		echo "</center>\n";
	}
	
	if( !isset($_POST['login_submit']) )
	{
		ShowLogin();
	}
	else
	{
		if( $script->Login($_POST['login_user'], $_POST['login_pass']) === FALSE )
		{
			ShowLogin("Invalid Username or Password.");
		}
		else
		{
			$userdata = $script->GetSessionData();
			if( isset($userdata['admin']) && $userdata['admin'] === TRUE )
			{
				Header("Location: index.php?verifylogin=1");
			}
			else
			{
				$script->Logout();
				ShowLogin("You dont have permissions to acess this page.");
			}
		}
	}
?>