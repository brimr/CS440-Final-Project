<?php
	require "db_connect.php";

	$OSU_ID = $_POST["OSU_ID"];
	$OSU_ID = mysql_real_escape_string( $OSU_ID );
	
	$Termcode = $_POST["Termcode"];
	$Termcode = mysql_real_escape_string( $Termcode );
	
	$Course_Num = $_POST["Course_Num"];
	$Course_Num = mysql_real_escape_string( $Course_Num );
	
	if( $OSU_ID == '' ) {
		$result = array('success' => false, 'message' => "Blank OSU_ID");
		print json_encode($result);
		return;
	}
	
	$termCourseQuery = 	"INSERT INTO TERM_COURSE (Student_ID, Termcode, Course_Num)
						VALUES ( '{$OSU_ID}', '{$Termcode}', '{$Course_Num}')";
	
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