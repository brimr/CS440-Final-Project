<?php
	require "db_connect.php";

	$trackQuery = 	"SELECT * FROM COURSE";
	
	$trackResults = mysql_query( $trackQuery );
	if( !$trackResults ) {
		print "QUERY FAILED: " . $trackQuery;
	}
	
	$rows = array();
	while($r = mysql_fetch_assoc($trackResults)) {
	    $rows[] = $r;
	}
	print json_encode($rows);
	
?>