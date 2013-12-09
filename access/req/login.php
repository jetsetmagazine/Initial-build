<?php
	include("common.php");
	include("header.php");
	
	function ShowLogin($errstr = "")
	{
		echo "<center>";
		if( !empty($errstr) )
			echo "<b>Error:</b> ".$errstr;
		
		echo "<form method=\"post\" action=\"login.php\">\n";
		
		echo "<table border=\"0\" width=\"300\" cellpadding=\"3\" cellspacing=\"3\">\n";
		echo "	<tr>\n";
		echo "		<td>Username:</td>\n";
		echo "		<td><input type=\"text\" name=\"user\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Password:</td>\n";
		echo "		<td><input type=\"password\" name=\"pass\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><input type=\"submit\" name=\"login\" value=\"Login\"></td>\n";
		echo "		<td><a href=\"register.php\">Register</a>&nbsp;&nbsp;<a href=\"forgot.php\">Forgot Password?</a></td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
		
		echo "</form>\n";
		echo "</center>\n";
	}
	
	if(!isset($_POST['login']))
	{
		ShowLogin();
	}
	else
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		
		if( $script->Login($user, $pass) )
			Header("Location: ./members/index.php");
		else
			ShowLogin("Invalid Username or Password");
	}

	include("footer.php");
	$script->Destroy();
?>