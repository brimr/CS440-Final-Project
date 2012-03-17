<?php
	require "db_connect.php";

	$Number = $_POST["Number"];
	$Number = mysql_real_escape_string( $Number );
	
	$Name = $_POST["Name"];
	$Name = mysql_real_escape_string( $Name );
	
	$Description = $_POST["Description"];
	$Description = mysql_real_escape_string( $Description );
	
	$termCourseQuery = 	"INSERT INTO COURSE 
						VALUES ( '{$Number}', '{$Name}', '{$Description}')";
	
	$termCourseResults = mysql_query( $termCourseQuery );
	$error = mysql_error();
	
	if( !$termCourseResults ) {
		$result = array('success' => false, 'message' => "{$error}");
		print json_encode($result);
	}
	else
	{
		$result = array('success' => true, 'message' => "");
		print json_encode($result);
	}
	
?>