<?php
	require "db_connect.php";

	$OSU_ID = $_POST["OSU_ID"];
	$OSU_ID = mysql_real_escape_string( $OSU_ID );
	
	$Termcode = $_POST["Termcode"];
	$Termcode = mysql_real_escape_string( $Termcode );
	
	$Track_Name = $_POST["Track_Name"];
	$Track_Name = mysql_real_escape_string( $Track_Name );

	$Description = $_POST["Description"];
	$Description = mysql_real_escape_string( $Description );
	
	
	if( $OSU_ID == '' ) {
		$result = array('success' => false, 'message' => "Blank OSU_ID");
		print json_encode($result);
		return;
	}
	
	$termCourseQuery = 	"INSERT INTO EVENT (Student_ID, Termcode, Track_Name, Description)
						VALUES ( '{$OSU_ID}', '{$Termcode}', '{$Track_Name}', '{$Description}')";
	
	$termCourseResults = mysql_query( $termCourseQuery );
	$error = mysql_error();
	
	if( !$termCourseResults ) {
		$result = array('success' => false, 'message' => "{$error}");
		print json_encode($result);
		//print "QUERY FAILED: " . $termCourseQuery;
	}
	else
	{
		$result = array('success' => true, 'message' => "");
		print json_encode($result);
	}
	
?>