<?php
	include("common.php");
	include("header.php");
	
	$script->Logout();
	
	Header("Location: login.php");

	$script->Destroy();
?>