<?php
	include("../common.php");
	include("../header.php");

	if(!$script->IsLoggedIn())
		Header("Location: ../login.php");

	DEFINE("_CLIENTAREA_", TRUE);

	echo "<body>";
	if($script->IsLoggedIn())
	{
		$sessiondata = $script->GetSessionData();
		echo "<p align=\"right\">Welcome back, ".$sessiondata['data']['fname'].". - <a href=\"index.php\">Member Area</a> ";
		$user = $script->GetSessionData();
		if( isset($user['admin']) && $user['admin'] === TRUE )
		echo "- <a href=\"../admin/index.php\">Admin Area</a> | ";
		echo "<a href=\"../logout.php\">Logout</a></p>\n";
	}
	else
	{
		echo "<p align=\"right\"><a href=\"../login.php\">Login</a></p>\n";
	}

	$sqlcon = $script->GetSQL();
	$sessiondata = $script->GetSessionData();
	$userdata = $sessiondata['data'];
	
	echo "<center>\n";
	$page = isset($_GET['p']) ? $_GET['p'] : "changedetails";
	
	echo "<a href=\"index.php?p=changepass\">Change Password</a> - <a href=\"index.php?p=changedetails\">Change Details</a>\n";
	echo "<hr width=\"600\"><br>\n";
	
	if($page == "changepass")
		include("changepass.php");
	elseif($page == "changedetails")
		include("changedetails.php");
	else
		echo "<b>Error:</b> Module not found.\n";
	
	echo "</center>\n";
	
	include("../footer.php");
	$script->Destroy();
?>
