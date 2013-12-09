<?php
	error_reporting(E_ALL);
	ob_start();
	
	DEFINE("_WORKSPACE_", TRUE);
	DEFINE("_ERROR_", TRUE);
	
	require "../includes/engine.php";
	require "../init.php";	
		
	include("header.php");
	
	if( !$script->IsLoggedIn() )
	{
		include("login.php");
	}
	else
	{
		$user = $script->GetSessionData();
		if( isset($user['admin']) && $user['admin'] === TRUE )
			include("area.php");
		else
			echo "You do not have the right permissions.";
	}
	
	include("footer.php");
?>