<?php
	require "db_connect.php";

	$track_name = $_POST["track"];
//	print "{$track_name}";

	$requiredCoursesQuery = "SELECT c.Number, c.Name FROM TRACK_COURSE AS tc
                                JOIN TRACK AS t ON t.Name = tc.Track_Name
                                JOIN COURSE AS c ON c.Number = tc.Course_Num
                                WHERE t.Name = \"{$track_name}\" ";

        $requiredCourses = mysql_query($requiredCoursesQuery);
        if( !$requiredCourses ) {
                print "QUERY FAILED: " . $requiredCoursesQuery;
        }

        function displayRequiredCoursesForTrackReport( $requiredCourses )
        {
                print '<table class="table table-striped table-bordered table-condensed span5">';
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

                print '</tbody>';
                print '</table>';
        }

	displayRequiredCoursesForTrackReport( $requiredCourses );
?>
