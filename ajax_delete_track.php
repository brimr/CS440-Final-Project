<?php
	require "db_connect.php";

	$Name = $_POST["Name"];
	$Name = mysql_real_escape_string( $Name );
	
	if( $Name == '' ) {
		$result = array('success' => false, 'message' => "Blank Name");
		print json_encode($result);
		return;
	}
	
	$studentQuery = 	"DELETE FROM TRACK 
						WHERE Name = '{$Name}'";
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