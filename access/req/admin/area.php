<?php

	if(!DEFINED("_WORKSPACE_"))
		die("Invalid Inclusion");
		
	$userdata = $script->GetSessionData();
	
	echo "Welcome Back, <b><a href=\"index.php\">".$userdata['data']['fname']."</a></b> to Admin Area. <a href=\"../logout.php\">Click here</a> to log out.<br>";
	echo "<br>";
	
	echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\" width=\"80%\">\n";
	echo "	<tr>\n";
	echo "		<td class=\"row1\" width=\"25%\"><b><center><a href=\"../members/index.php\">Member Area</a></center></b></td>\n";
	echo "		<td class=\"row1\" width=\"25%\"><b><center><a href=\"index.php\">Statistics</a></center></b></td>\n";
	echo "		<td class=\"row1\" width=\"25%\"><b><center><a href=\"index.php?ap=members\">Members</a></center></b></td>\n";
	echo "		<td class=\"row1\" width=\"25%\"><b><center><a href=\"export.php\">Export CSV</a></center></b></td>\n";
	echo "	</tr>\n";
	echo "</table>\n";

	echo "<table border=\"0\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%\">\n";
	echo "	<tr>\n";
	echo "		<td class=\"row1\" width=\"100%\">";
	
	// Content.
	$ap = isset($_GET['ap']) ? $_GET['ap'] : "default";
	$page = str_replace(".", "", $ap).".php";
	if(!@include($page))
	{
		echo "<center><br><b>Module not found</b><br><br></center>\n";
	}
	
	echo "</td>\n";
	echo "	</tr>\n";
	echo "</table>\n";
	
?>
