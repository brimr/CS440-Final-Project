<?php
	require "db_connect.php";

	$OSU_ID = $_GET["OSU_ID"];
	$Termcode = $_GET["Termcode"];

	$termCourseQuery = 	"SELECT DISTINCT c.Name, c.Number, c.Description
						FROM TERM_COURSE AS tc
						JOIN COURSE c ON tc.Course_Num = c.Number
						WHERE tc.Student_ID = '{$OSU_ID}'
						AND Termcode = '{$Termcode}'";
	
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