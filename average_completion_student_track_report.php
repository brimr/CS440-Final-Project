<?php
	require "db_connect.php";
	
	//$startYear = 0;
	//$endYear = 0;
	$startYear = $_GET['startYear'];
	$endYear = $_GET['endYear'];
	
	if ($startYear == "")
		$startYear = 2007;
		
	if ($endYear == "")
		$endYear = 2012;
		
	//print "<th> {$startYear} </th>";
	//print "<th> {$endYear} </th>";
	
	$graduatedTrackQuery = "SELECT g.Track_Name, g.Date AS Grad_date, e.Date AS Enrolled_date
							FROM EVENT AS g, EVENT AS e
							WHERE e.Student_ID = g.Student_ID AND e.Description = 'Enrolled' AND
							g.Description = 'Graduated' AND g.Date >= '{$startYear}-01-01'
							AND g.Date <= '{$endYear}-12-31'
							ORDER BY g.Track_Name, Grad_date;";
							
	$graduatedTrack = mysql_query($graduatedTrackQuery );
	
	if( !$graduatedTrack ) {
		print "QUERY FAILED: " . $graduatedTrackQuery ;
	}
	
	$yearsInDatabaseQuery = "SELECT Date
							 FROM EVENT
							 WHERE Description = 'Graduated';";
						
	$yearsInDatabase = mysql_query($yearsInDatabaseQuery);
							
	if( !$yearsInDatabase ) {
		print "QUERY FAILED: " . $yearsInDatabaseQuery ;
	}
	
	function getMinMaxYear($yearsInDatabase)
	{
		global $minYear; // = 0;
		global $maxYear; // = 0;
		
		while( $graduatedRow = mysql_fetch_array( $yearsInDatabase ) )
		{
			$currentYear = substr($graduatedRow["Date"], 0, 4);
			if ($minYear == 0 || $minYear > $currentYear) {
				$minYear = $currentYear;
			}
			
			if ($maxYear == 0 || $maxYear < $currentYear) {
				$maxYear = $currentYear;
			}
		}
		//print "<th> {$minYear} </th>";
		//print "<th> {$maxYear} </th>";
	}
	
	function displayGraduatedTimeForTrackReport($graduatedTrack, $minYear, $maxYear)
	{
		$numYears = $maxYear - $minYear + 1;
		print '<table class="table table-striped table-bordered table-condensed">';
		print '<thead><tr>';
		print '<th>Track</th>';
		print '<th colspan="15" align="center">Graduation Year</th>';
		print '</tr></thead>';
		print '<thead><tr>';
		//print '</tr>';
		print '<th>  </th>';
		
		$year = $minYear;
		while ($year <= $maxYear) 
		{
			print "<th> $year </th>";
			$year ++;
		}
		//print "<th> {$minYear} </th>";
		//print "<th> {$maxYear} </th>";
		print '</tr></thead>';
		print '<tbody>';
		
		$track = "";
		$timeToGraduate = 0.0;
		$count = 0;		
		$year = "";
		$secondsInYear = 31556926; //365*24*60*60;
		//$found = false;
		$currentYear = $minYear;

		while( $graduatedRow = mysql_fetch_array( $graduatedTrack ) )
		{
			$newTrack = $graduatedRow["Track_Name"];
			$newYear = substr($graduatedRow["Grad_date"], 0, 4);
			//echo "newTrack = ", $newTrack, "   ";
			//echo "newYear = ", $newYear, "   ";
			//echo $newYear;
			//echo $currentYear;

			if( $track == "") {
				$track = $newTrack;
				print "<td> {$track} </td>";
			}
			if ( $year == "") {
				$year = $newYear;
			}
			
			if ($newTrack == $track && $newYear != $year) {
				
				if ($count != 0) {
					$averageTimeToGraduate = $timeToGraduate/$count;
					printf ("<td> %.2f</td>", $averageTimeToGraduate);
					$currentYear++;
					$track = $newTrack;
					$year = $newYear;
					$timeToGraduate = 0.0;
					$count = 0;
				} 
				
				while ($currentYear < $year)
				{
					print "<td></td>";
					$currentYear++;
				}
			}
			
			if ($newTrack != $track) {
				//echo "I'M IN THE LOOP!!    ";
				if ($count != 0) {
					$averageTimeToGraduate = $timeToGraduate/$count;
					printf ("<td> %.2f</td>", $averageTimeToGraduate);
					$currentYear++;
					$track = $newTrack;
					$year = $newYear;
					$timeToGraduate = 0.0;
					$count = 0;
				} 
				
				while ($currentYear <= $maxYear)
				{
					print "<td></td>";
					$currentYear++;
				}
				
				print "</tr>";
				print "<tr>";
				print "<td> {$track} </td>";
				$currentYear = $minYear;
			}
			
			while ($currentYear < $year)
			{
				print "<td></td>";
				$currentYear++;
			}
			
			//if ($newTrack == $track || $newYear == $year)
			//{	
				$enrollDate = strtotime($graduatedRow["Enrolled_date"]);
				$graduatedDate = strtotime($graduatedRow["Grad_date"]);
				$timeToGraduate += ($graduatedDate - $enrollDate)/$secondsInYear;
				$count++;
				//echo "count = ", $count, "   ";
			//}
		}
		
		if ($count != 0) {
			$averageTimeToGraduate = $timeToGraduate/$count;
			printf ("<td> %.2f</td>", $averageTimeToGraduate);
			$currentYear++;
			
			while ($currentYear <= $maxYear)
			{
				print "<td></td>";
				$currentYear++;
			}
		} else {
			while ($currentYear <= $maxYear)
			{
				print "<td></td>";
				$currentYear++;
			}
		}
		print '</tr>';
		print '</thead>';
		print '</table>';
	}	
	$minYear = 0;
	$maxYear = 0;
	
	getMinMaxYear($yearsInDatabase);
	if ($startYear < $minYear) {
		$startYear = $minYear;
		print "<h4> Earliest Year available is {$minYear} </h4>";
		print "<h4></h4>";
	}
	if ($endYear > $maxYear) {
		$endYear = $maxYear;
		print "<h4> Latest Year available is {$maxYear} </h4>";
	}
	displayGraduatedTimeForTrackReport($graduatedTrack, $startYear, $endYear);

?>
