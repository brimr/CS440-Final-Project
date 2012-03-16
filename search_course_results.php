<?php
	require "db_connect.php";

	$Number = $_POST["Number"];
	$Number = mysql_real_escape_string( $Number );
	
	$Name = $_POST["Name"];
	$Name = mysql_real_escape_string( $Name );
	
	$Description = $_POST["Description"];
	$Description = mysql_real_escape_string( $Description );

	//print "HERE: {$OSU_ID}";
	//print "HERE: {$FirstName}";
	//print "HERE: {$LastName}";

	$searchCourseQuery = "SELECT * FROM COURSE
				WHERE Number LIKE '%{$Number}%' 
				AND Name LIKE '%{$Name }%'
				AND Description LIKE '%{$Description}%'
				ORDER BY Number;";
	
	$courseResults = mysql_query( $searchCourseQuery );
	if( !$courseResults ) {
		print "QUERY FAILED: " . $searchCourseQuery;
	}
	
	$rows = array();
	while($r = mysql_fetch_assoc($courseResults)) {
	    $rows[] = $r;
	}
	print json_encode($rows);
?>
