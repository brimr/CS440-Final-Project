<?php
	require "db_connect.php";
	
	$graduatedTrackQuery = "SELECT g.Track_Name, g.Date AS Grad_date, e.Date AS Enrolled_date
							FROM EVENT AS g, EVENT AS e
							WHERE e.Student_ID = g.Student_ID AND e.Description = 'Enrolled' AND
							g.Description = 'Graduated'
							ORDER BY g.Track_Name, Grad_date;";
							
	$graduatedTrack = mysql_query($graduatedTrackQuery );
							
	if( !$graduatedTrack ) {
		print "QUERY FAILED: " . $graduatedTrackQuery ;
	}

	function displayGraduatedTimeForTrackReport($graduatedTrack)
	{
		print '<table class="table table-striped table-bordered table-condensed">';
		print '<thead><tr>';
		print '<th>Track</th>';
		print '<th>Completion Year</th>';
		print '<th>Average Time to Complete a Track</th>';
		print '</tr></thead>';
		print '<tbody>';
		
		$track = "";
		$timeToGraduate = 0.0;
		$count = 0;		
		$year = "";
		$secondsInYear = 31556926; //365*24*60*60;
		$found = false;

		while( $graduatedRow = mysql_fetch_array( $graduatedTrack ) )
		{
			$newTrack = $graduatedRow["Track_Name"];
			$newYear = substr($graduatedRow["Grad_date"], 0, 4);

			if( $track == "") {
				$track = $newTrack;
			}
			if ( $year == "") {
				$year = $newYear;
			}
			
			if ($newTrack != $track || $newYear != $year) {
			
				// if ($count == 0) {
					// continue;
				// }
				$averageTimeToGraduate = $timeToGraduate/$count;
								
				print '<tr>';
				print "<td> {$track} </td>";
				print "<td> {$year} </td>";
				//print "<td> {$averageTimeToGraduate} years</td>";
				printf ("<td> %.2f years</td>", $averageTimeToGraduate);
				print '</tr>';
				
				$track = $newTrack;
				$year = $newYear;
				$timeToGraduate = 0.0;
				$count = 0;
			}
			
			$enrollDate = strtotime($graduatedRow["Enrolled_date"]);
			$graduatedDate = strtotime($graduatedRow["Grad_date"]);
			$timeToGraduate += ($graduatedDate - $enrollDate)/$secondsInYear;
			$count++;
			
		}
		print '</thead>';
		print '</table>';
	}	
	
	displayGraduatedTimeForTrackReport( $graduatedTrack, $enrolledTrack );
?>
