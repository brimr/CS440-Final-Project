<?php
	require "db_connect.php";

	$OSU_ID = $_POST["OSU_ID"];
	$OSU_ID = mysql_real_escape_string( $OSU_ID );
	
	$FirstName = $_POST["FirstName"];
	$FirstName = mysql_real_escape_string( $FirstName );
	
	$LastName = $_POST["LastName"];
	$LastName = mysql_real_escape_string( $LastName );

	//print "HERE: {$OSU_ID}";
	//print "HERE: {$FirstName}";
	//print "HERE: {$LastName}";

	$searchStudentQuery = 	"SELECT * FROM STUDENT
				WHERE OSU_ID LIKE '%{$OSU_ID}%' 
				AND First_Name LIKE '%{$FirstName}%'
				AND Last_Name LIKE '%{$LastName}%'
				ORDER BY OSU_ID";
	
	$studentResults = mysql_query( $searchStudentQuery );
	if( !$studentResults ) {
		print "QUERY FAILED: " . $studentResults;
	}
	
	$rows = array();
	while($r = mysql_fetch_assoc($studentResults)) {
	    $rows[] = $r;
	}
	print json_encode($rows);
?>
