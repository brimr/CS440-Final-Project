<?php
	require "db_connect.php";

	$Number = $_POST["Number"];
	$Number = mysql_real_escape_string( $Number );
	
	if( $Number == '' ) {
		$result = array('success' => false, 'message' => "Blank Number");
		print json_encode($result);
		return;
	}
	
	$studentQuery = 	"DELETE FROM COURSE 
						WHERE Number = '{$Number}'";
	$Results1 = mysql_query( $studentQuery );

	$error = mysql_error();
	
	if( !$Results1  ) {
		$result = array('success' => false, 'message' => "{$error}");
		print json_encode($result);
	}
	else
	{
		$result = array('success' => true, 'message' => "");
		print json_encode($result);
	}
	
?>