<?php
	require "db_connect.php";

	$Name = $_POST["Name"];
	$Name = mysql_real_escape_string( $Name );
	
	$Major = $_POST["Major"];
	$Major = mysql_real_escape_string( $Major );
	
	$Description = $_POST["Description"];
	$Description = mysql_real_escape_string( $Description );

	$searchCourseQuery = "SELECT * FROM TRACK
				WHERE Name LIKE '%{$Name}%' 
				AND Major LIKE '%{$Major }%'
				ORDER BY Name;";
				//AND Description LIKE '%{$Description}%'
				
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
