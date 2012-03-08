<?php
	require "db_connect.php";
	
	$studentCoursesPerTrackQuery = "SELECT e.Student_ID, e.Track_Name, COUNT(term.Course_Num) AS Num_Courses
									FROM EVENT AS e
										JOIN TERM_COURSE AS term ON e.Student_ID = term.Student_ID
										JOIN TRACK_COURSE AS track ON e.Track_Name = track.Track_Name 
										AND	term.Course_Num = track.Course_Num
									WHERE term.Completed = 'Y' AND e.Description = 'Enrolled'
									GROUP BY e.Student_ID
									ORDER BY Track_Name;";
									
									
	$numberOfCoursesPerTrackQuery = "SELECT Track_Name, COUNT(Course_Num) AS Num_Track_Courses
									FROM TRACK_COURSE
									GROUP BY `Track_Name`
									ORDER BY Track_Name;";
									

	$studentCoursesPerTrack = mysql_query($studentCoursesPerTrackQuery );
	if( !$studentCoursesPerTrack ) {
		print "QUERY FAILED: " . $studentCoursesPerTrackQuery ;
	}
	
	$numberOfCoursesPerTrack = mysql_query($numberOfCoursesPerTrackQuery );
	if( !$numberOfCoursesPerTrack ) {
		print "QUERY FAILED: " . $numberOfCoursesPerTrackQuery ;
	}

	function displayNumberOfCoursesPerTrackReport( $studentCoursesPerTrack, $numberOfCoursesPerTrack )
	{
		print '<table class="table table-striped table-bordered table-condensed">';
		print '<thead><tr>';
		print '<th>Track</th>';
		print '<th>0-25%</th>';
		print '<th>25-50%</th>';
		print '<th>50-75%</th>';
		print '<th>75-100%</th>';
		print '</tr></thead>';
		print '<tbody>';
		
		$range1 = 0;
		$range2 = 0;
		$range3 = 0;
		$range4 = 0;
		$track = "";
		
		while( $row = mysql_fetch_array( $studentCoursesPerTrack ) )
		{
			$newTrack = $row["Track_Name"];
			//echo "newTrack = ", $newTrack, "   ";
			
			if( $track == "") {
				$track = $newTrack;
			}
			//echo "track = ", $track, "    ";
			
			if ($newTrack != $track) {
				
				print '<tr>';
				print "<td> $track </td>";
				print "<td> $range1 </td>";
				print "<td> $range2 </td>";
				print "<td> $range3 </td>";
				print "<td> $range4 </td>";
				print '</tr>';
				
				$range1 = 0;
				$range2 = 0;
				$range3 = 0;
				$range4 = 0;
				$track = $newTrack;
			}
			
			$numCourses = $row["Num_Courses"];
			//echo "NumCourses = ", $numCourses, "   ";
			while ( $trackRow = mysql_fetch_array($numberOfCoursesPerTrack)) {
				if ($trackRow["Track_Name"] == $track) {
					$totalCourses = $trackRow["Num_Track_Courses"];
					//echo "TotalCourses = ", $totalCourses, "   ";
				} else 
					continue;
			}

			
			$percentComplete = $numCourses/$totalCourses * 100;
			//echo $percentComplete. "   ";
			if ($percentComplete < 25)
				$range1++;
			if ($percentComplete >= 25 && $percentComplete < 50)
				$range2++;
			if ($percentComplete >= 50 && $percentComplete < 75)
				$range3++;
			if ($percentComplete >= 75)
				$range4++;
		}
		print '<tr>';
		print "<td> $track </td>";
		print "<td> $range1 </td>";
		print "<td> $range2 </td>";
		print "<td> $range3 </td>";
		print "<td> $range4 </td>";
		print '</tr>';
		print '</thead>';
		print '</table>';
	}	
//	print "Done";
	displayNumberOfCoursesPerTrackReport($studentCoursesPerTrack, $numberOfCoursesPerTrack );
?>
