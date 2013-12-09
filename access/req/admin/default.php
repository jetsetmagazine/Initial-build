<?php
	if(!DEFINED("_WORKSPACE_"))
		die("Invalid Inclusion");
	
	function CountTable($tablename)
	{
		global $script;
		
		$sqlcon = $script->GetSQL();
		
		$result = mysql_query("SELECT * FROM `".$tablename."`", $sqlcon);
		if(!$result)
			return 0;
			
		return mysql_num_rows($result);
	}
	
	echo "<b><u>Statistics</u></b><br><br>\n";
	
	echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"4\" width=\"100%\">\n";
	echo "	<tr>\n";
	echo "		<td width=\"25%\">Members:</td>\n";
	echo "		<td width=\"25%\">".CountTable("members")."</td>\n";
	echo "	</tr>\n";
	echo "</table>\n";
	
?>
