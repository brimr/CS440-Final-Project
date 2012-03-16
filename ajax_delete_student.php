<?php
	require "db_connect.php";

	$OSU_ID = $_POST["OSU_ID"];
	$OSU_ID = mysql_real_escape_string( $OSU_ID );
	
	if( $OSU_ID == '' ) {
		$result = array('success' => false, 'message' => "Blank OSU_ID");
		print json_encode($result);
		return;
	}
	
	$studentQuery = 	"DELETE FROM STUDENT 
						WHERE OSU_ID = '{$OSU_ID}'";
	$Results1 = mysql_query( $studentQuery );
	
	$termCourseQuery = 	"DELETE FROM TERM_CODE 
						WHERE OSU_ID = '{$OSU_ID}'";			
	$Results2 = mysql_query( $studentQuery );
						
	$eventQuery = 		"DELETE FROM EVENT 
						WHERE OSU_ID = '{$OSU_ID}'";				
	$Results3 = mysql_query( $studentQuery );
	
	$error = mysql_error();
	
	if( !$Results1 || !$Results2 || !$Results3 ) {
		$result = array('success' => false, 'message' => "{$error}");
		print json_encode($result);
	}
	else
	{
		$result = array('success' => true, 'message' => "");
		print json_encode($result);
	}
	
?>