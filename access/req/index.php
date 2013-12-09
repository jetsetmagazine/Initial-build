<?php
	include("common.php");
	
	if(!$script->IsLoggedIn())
	{
		Header("Location: login.php");
	}
	else
	{
		Header("Location: ./members/index.php");
	}

	$script->Destroy();
?>