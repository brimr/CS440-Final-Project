<?php
	require "db_connect.php";

	$termQuery = 	"SELECT * FROM TERM";
	
	$termResults = mysql_query( $termQuery );
	if( !$termResults ) {
		print "QUERY FAILED: " . $termQuery;
	}
	
	$rows = array();
	while($r = mysql_fetch_assoc($termResults)) {
	    $rows[] = $r;
	}
	print json_encode($rows);
	
?>