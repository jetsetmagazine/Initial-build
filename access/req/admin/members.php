<?php
	error_reporting(E_ALL);
	
	if(!DEFINED("_WORKSPACE_"))
		die("Invalid Inclusion");
	
	$sqlcon = $script->GetSQL();
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	
	function DisplayUser()
	{
		global $script;
		
		echo "<a href=\"index.php?ap=members&action=add\">Add Member</a><br><br>\n";
		echo "<table border=\"0\" width=\"100%\" cellpadding=\"3\" cellspacing=\"3\">\n";
		echo "	<tr>\n";
		echo "		<td class=\"row2\"><b>#</b></td>\n";
		echo "		<td class=\"row2\"><b>User</b></td>\n";
		echo "		<td class=\"row2\"><b>E-Mail</b></td>\n";
		echo "		<td class=\"row2\"><b>First Name</b></td>\n";
		echo "		<td class=\"row2\"><b>Last Name</b></td>\n";
		echo "		<td class=\"row2\"></td>\n";
		echo "	</tr>\n";
		
		$script->GetMembers($members, $count);
		for($i = 0; $i < $count; $i++)
		{
				$rs = (2 - (($i + 1) % 2));
				$row_user = $members[$i];
				echo "	<tr>\n";
				echo "		<td class=\"row".$rs."\">".$row_user['id']."</td>\n";
				echo "		<td class=\"row".$rs."\">".$row_user['user']."</td>\n";
				echo "		<td class=\"row".$rs."\">".$row_user['email']."</td>\n";
				echo "		<td class=\"row".$rs."\">".$row_user['fname']."</td>\n";
				echo "		<td class=\"row".$rs."\">".$row_user['lname']."</td>\n";
				echo "		<td class=\"row".$rs."\"><a href=\"index.php?ap=members&action=edit&id=".$row_user['id']."\">Edit</a> | <a href=\"index.php?ap=members&action=delete&id=".$row_user['id']."\" onClick=\"return confirm('Are you sure to delete this entry?')\">Delete</a></td>\n";
				echo "	</tr>\n";
				
		}

		echo "</table>\n";
	}
	
	function ShowEdit($id, $action = "edit")
	{	
		$user = ""; $email = ""; $fname = ""; $lname = ""; $admin = FALSE; $validated = FALSE;
		
		if($id != 0)
		{
			$result = mysql_query("SELECT * FROM `members` WHERE `id` = '".$id."';");
			if($result)
			{
				$row = mysql_fetch_assoc($result);
				$user = $row['user'];
				$email = $row['email'];
				$fname = $row['fname'];
				$lname = $row['lname'];
				$admin = (BOOL)$row['admin'];
				$validated = empty($row['regkey']) ? TRUE : FALSE;
			}
		}
		
		echo "<center>\n";
		if($action == "edit")
			echo "<form method=\"post\" action=\"index.php?ap=members&action=edit&id=".$id."\">\n";
		else
			echo "<form method=\"post\" action=\"index.php?ap=members&action=add\">\n";
			
		echo "<table border=\"0\" width=\"400\" align=\"center\" cellspacing=\"5\" cellpadding=\"5\">\n";
		echo "	<tr>\n";
		echo "		<td><b>Username *:</b></td>\n";
		echo "		<td><input type=\"text\" name=\"username\" value=\"".$user."\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><b>E-Mail *:</b></td>\n";
		echo "		<td><input type=\"text\" name=\"email\" value=\"".$email."\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><b>First Name:</b></td>\n";
		echo "		<td><input type=\"text\" name=\"fname\" value=\"".$fname."\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><b>Last Name:</b></td>\n";
		echo "		<td><input type=\"text\" name=\"lname\" value=\"".$lname."\"></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><b>Admin *:</b></td>\n";
		echo "		<td><input type=\"checkbox\" name=\"admin\"".($admin === TRUE ? " checked" : "")."></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td><b>Validated *:</b></td>\n";
		echo "		<td><input type=\"checkbox\" name=\"validated\"".($validated === TRUE ? " checked" : "")."></td>\n";
		echo "	</tr>\n";
		echo "	<tr>\n";
		echo "		<td></td>\n";
		echo "		<td></td>\n";
		echo "	</tr>\n";
		
		echo "	<tr>\n";
		if($action == "edit")
			echo "		<td><b>New Password:</b></td>\n";
		else
			echo "		<td><b>Password *:</b></td>\n";
		echo "		<td><input type=\"password\" name=\"new_pass\"></td>\n";
		echo "	</tr>\n";
		
		if($action == "edit")
		{
			echo "	<tr>\n";
			echo "		<td><b>Confirm Password:</b></td>\n";
			echo "		<td><input type=\"password\" name=\"new_pass2\"></td>\n";
			echo "	</tr>\n";
		}
		
		echo "	<tr>\n";
		echo "		<td></td>\n";
		
		if($action == "edit")
			echo "		<td><input type=\"submit\" name=\"editmember_submit\" value=\"Edit\"></td>\n";
		else
			echo "		<td><input type=\"submit\" name=\"editmember_submit\" value=\"Add\"></td>\n";
			
		echo "	</tr>\n";
		echo "</form>\n";
		echo "</center>\n";
	}
	
	if($action == "")
	{
		DisplayUser();
	}
	elseif($action == "edit")
	{
		$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
		
		if( !isset($_POST['editmember_submit']) && $id != 0 )
		{
			ShowEdit($id);
		}
		elseif( isset($_POST['editmember_submit']) && $id != 0 )
		{
			$newpass = "";
			
			if( !empty($_POST['new_pass']) && !empty($_POST['new_pass2']) )
			{
				if($_POST['new_pass'] == $_POST['new_pass2'])
				{
					$newpass = md5($_POST['new_pass']);
				}
			}
			
			$user = $_POST['username'];
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			$admin = isset($_POST['admin']) ? 1 : 0;
			$validated = isset($_POST['validated']) ? "" : "1";
			
			$query = "UPDATE `members` SET `user` = '".$user."', `email` = '".$email."', `fname` = '".$fname."', `lname` = '".$lname."', `admin` = '".$admin."'";
			if( !empty($newpass) )
			{
				$query .= ", `pass` = '".$newpass."'";
			}
			$query .= " WHERE `id` = '".$id."';";
			
			$result = mysql_query($query, $sqlcon);
			if($result)
			{
				echo "<center><br><b>Edited Member</b><br><br></center>\n";
			}
			else
			{
				echo mysql_error();
			}
			
			DisplayUser();
		}
		else
		{
			DisplayUser();
		}
	}
	elseif($action == "delete")
	{
		$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
		if($id != 0)
		{
			$result = mysql_query("DELETE FROM `members` WHERE `id` = '".$id."';");
		}
		DisplayUser();
	}
	elseif($action == "add")
	{
		if( !isset($_POST['editmember_submit']) )
		{
			ShowEdit(0, "add");
		}
		else
		{
			$user = $_POST['username'];
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
					
			$admin = isset($_POST['admin']) ? 1 : 0;
			$validated = isset($_POST['validated']) ? "" : "1";
			$newpass = md5($_POST['new_pass']);
			$errstr = "";
			
			if($script->CreateUser($user, $newpass, $email, $fname, $lname, $admin, FALSE, $errstr) === FALSE)
			{
				echo "<center><br><b>Error: ".$errstr."</b><br><br></center>\n";
				ShowEdit(0, "add");
			}
			else
			{
				echo "<center><br><b>Added Member</b><br><br></center>\n";
				DisplayUser();
			}
		}
	}
?>