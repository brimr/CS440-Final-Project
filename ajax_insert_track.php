<?php
	require "db_connect.php";

	$Name = $_POST["Name"];
	$Name = mysql_real_escape_string( $Name );
	
	$Major = $_POST["Major"];
	$Major = mysql_real_escape_string( $Major );
	
	$Description = $_POST["Description"];
	$Description = mysql_real_escape_string( $Description );
	
	$termCourseQuery = 	"INSERT INTO TRACK 
						VALUES ( '{$Name}', '{$Major}', '{$Description}')";
	
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