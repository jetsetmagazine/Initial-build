<?php
	ob_start();	// Important.
	
//	DEFINE("_DEBUG_", TRUE);									// Debug Purpose only!
	DEFINE("_ERROR_", TRUE);									// Show Critical Errors
		
	DEFINE("_VALIDATEURL_", "http://www.dev.jetsetmag.com/access/req");	    	// No trailing slash.
	DEFINE("_VALIDATION_", TRUE);								// Requires user validation in E-Mail.
	
	// Require the User Engine
	require "includes/engine.php";
	require "init.php";	
?>