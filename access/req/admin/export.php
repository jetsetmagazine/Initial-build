<?php
//	error_reporting(E_ALL);

	include("../common.php");
	
	$sqlcon = $script->GetSQL();

	$csv_output = "";
	$table = "members";
	
	$result = mysql_query("SHOW COLUMNS FROM csvtable");
	$i = 0;
	if (mysql_num_rows($result) > 0) {
	while ($row = mysql_fetch_assoc($result)) {
//	$csv_output .= $row['Field'].", ";
	$i++;
	}
	}
	$csv_output .= "\n";
	
	$values = mysql_query("SELECT fname,email FROM `$table`");
	while ($rowr = mysql_fetch_row($values)) {
	for ($j=0;$j<$i;$j++) {
	$csv_output .= $rowr[$j].", ";
	}
	$csv_output .= "\n";
	}

	$filename = $table."_".date("Y-m-d_H-i-s",time());
	header("Content-type: application/vnd.ms-excel");
	header("Content-disposition: csv" . date("Y-m-d") . ".csv");
	header( "Content-disposition: filename=".$filename.".csv");
	print $csv_output;
	exit;

?>