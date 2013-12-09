<?php
	if(!DEFINED("_CLIENTAREA_"))
		die("Invalid inclusion.");
		
	function ShowEdit($errstr = "")
	{
		global $userdata, $sqlcon;
		
		$email = ""; $fname = ""; $lname = "";
		
		$uid = $userdata['id'];
		$result = mysql_query("SELECT * FROM `members` WHERE `id` = '".$uid."';");
		if($result)
		{
			if(mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_assoc($result);
				$email = $row['email'];
				$fname = $row['fname'];
				$lname = $row['lname'];
			}
		}
		
		echo "<center>\n";
		if( !empty($errstr) )
			echo "<b>Error:</b> ".$errstr."<br><br>\n";
		else
			echo "<b>Fields marked with * are required</b><br><br>\n";
			
		echo "<form method=\"post\" action=\"index.php?p=changedetails\">\n";
		echo "<table border=\"0\" width=\"300\" cellpadding=\"3\" cellspacing=\"3\">\n";
		echo "	<tr>\n";
		echo "		<td>E-Mail *:</td>\n";
		echo "		<td><input type=\"text\" name=\"email\" value=\"".$email."\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>First Name *:</td>\n";
		echo "		<td><input type=\"text\" name=\"fname\" value=\"".$fname."\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td>Last Name *:</td>\n";
		echo "		<td><input type=\"text\" name=\"lname\" value=\"".$lname."\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td></td>\n";
		echo "		<td><input type=\"submit\" name=\"editprofile\" value=\"Update\"></td>\n";
		echo "	</tr>\n";
		echo "</table>\n";
		echo "</form>\n";
		echo "</center>\n";
	}
	
	if( !isset($_POST['editprofile']) )
	{
		ShowEdit();
	}
	else
	{
		$query = "UPDATE `members` SET ";
		$allfields = TRUE;
		$index = 1;
		foreach($_POST as $key => $value)
		{
			$index++;
			if($key != "editprofile")
			{
				if( empty($value) )
				$allfields = FALSE;
				$query .= "`".$key."` = '".$value."'";
				if($index != count($_POST))
					$query .= ", ";
			}
		}
		$query .= " WHERE `id` = '".$userdata['id']."';";

		if($allfields == FALSE)
		{
			ShowEdit("All Fields marked with * are required.");
		}
		else
		{
			$result = mysql_query($query, $sqlcon);
			echo "<b>Updated Details.</b> <a href=\"index.php\">Click here to go back</a>\n";
		}
	}
	
?>