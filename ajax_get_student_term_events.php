<?php
	require "db_connect.php";

	$OSU_ID = $_GET["OSU_ID"];
	$OSU_ID = mysql_real_escape_string( $OSU_ID );
	$Termcode = $_GET["Termcode"];
	$Termcode = mysql_real_escape_string( $Termcode );

	if( $OSU_ID == '' ) {
		$result = array('success' => false, 'message' => "Blank OSU_ID");
		print json_encode($result);
		return;
	}
	
	$termCourseQuery = 	"SELECT DISTINCT e.Track_Name, e.Description, e.Date
						FROM EVENT AS e
						WHERE e.Student_ID = '{$OSU_ID}'
						AND e.Termcode = '{$Termcode}'";
	
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