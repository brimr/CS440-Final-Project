<?php
	require "db_connect.php";
	require "selectDistinctDropDown.php";

	$firstTrackOptionQuery = "SELECT Name FROM TRACK ORDER BY Name LIMIT 1";

	$result = mysql_query( $firstTrackOptionQuery );
	if( !$result ) {
		print "QUERY FAILED: " . $firstTrackOptionQuery;
	}

	print '<div>';
	selectDistinctDropDown( "TRACK", "Name", "requiredCoursesSelect", mysql_result( $result, 0 ), "span4" );
	print '</div>';

	print '<div id="requiredCourses">';
	print '</div>';
?>
