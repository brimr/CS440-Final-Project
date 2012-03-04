<?php
	require "db_connect.php";

	$OSU_ID = $_GET["OSU_ID"];

	$termCourseQuery = 	"SELECT DISTINCT t.Name, t.Academic_Year, t.Termcode
						FROM TERM_COURSE AS tc
						JOIN TERM t ON tc.Termcode = t.Termcode
						WHERE Student_ID = '{$OSU_ID}'";
	
	$termCourseResults = mysql_query( $termCourseQuery );
	if( !$termCourseResults ) {
		print "QUERY FAILED: " . $termCourseQuery;
	}
	
	$rows = array();
	while($r = mysql_fetch_assoc($termCourseResults)) {
	    $rows[] = $r;
	}
	print json_encode($rows);
	
?>