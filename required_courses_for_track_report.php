<?php
	require "db_connect.php";


	$requiredCoursesQuery = "SELECT c.Number, c.Name FROM TRACK_COURSE AS tc
                           	JOIN TRACK AS t ON t.ID = tc.Track_ID
                           	JOIN COURSE AS c ON c.Number = tc.Course_ID
                           	WHERE t.ID = 1";

	$requiredCourses = mysql_query($requiredCoursesQuery);
	if( !$requiredCourses ) {
		print "QUERY FAILED: " . $requiredCoursesQuery;
	}

	function displayRequiredCoursesForTrackReport( $requiredCourses )
	{
		print '<table class="table table-striped table-bordered table-condensed">';
		print '<thead><tr>';
		print '<th>Course Number</th>';
		print '<th>Course Name</th>';
		print '</tr></thead>';
		print '<tbody>';

		while( $row = mysql_fetch_array( $requiredCourses ) )
		{
			print '<tr>';
			print "<td> {$row["Number"]} </td>";
			print "<td> {$row["Name"]} </td>";
			print '</tr>';
		}

		print '</thead>';
		print '</table>';
	}
	
	displayRequiredCoursesForTrackReport( $requiredCourses );
?>
