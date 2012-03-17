<?php
	require "db_connect.php";

	$Name = $_POST["Name"];
	$Name = mysql_real_escape_string( $Name );
	
	$Major = $_POST["Major"];
	$Major = mysql_real_escape_string( $Major );
	
	$Description = $_POST["Description"];
	$Description = mysql_real_escape_string( $Description );
	
	if( $Name == '' ) {
		$result = array('success' => false, 'message' => "Blank Name");
		print json_encode($result);
		return;
	}
	
	$termCourseQuery = 	"UPDATE TRACK 
						SET Major = '{$Major}', 
						Description = '{$Description}'
						WHERE Name = '{$Name}'";
	
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