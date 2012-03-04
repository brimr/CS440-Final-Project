<?php
	require "db_connect.php";

	$OSU_ID = $_POST["OSU_ID"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];

//	print "HERE: {$OSU_ID}";

	$searchStudentQuery = 	"SELECT * FROM STUDENT
				WHERE OSU_ID LIKE '%{$OSU_ID}%' 
				AND First_Name LIKE '%{$FirstName}%'
				AND Last_Name LIKE '%{$LastName}%'
				ORDER BY OSU_ID";
	
	$studentResults = mysql_query( $searchStudentQuery );
	if( !$studentResults ) {
		print "QUERY FAILED: " . $studentResults;
	}
	
	$rows = array();
	while($r = mysql_fetch_assoc($studentResults)) {
	    $rows[] = $r;
	}
	print json_encode($rows);
	
	/*
	print '<table class="table table-striped table-bordered table-condensed">';
	print '<thead><tr>';
	print '<th>OSU ID</th>';
	print '<th>First Name</th>';
	print '<th>Last Name</th>';
	print '<th>Middle Intial</th>';
	print '<th>BirthDate</th>';
	print '<th>Gender</th>';
	print '<th>Enicity</th>';
	print '</tr></thead>';
	print '<tbody>';

	while( $row = mysql_fetch_row( $studentResults ) ) 
	{
		print '<tr>';
		foreach($row as $data)
			print "<td> {$data} </td>";
		print '</tr>';
	}

	print '</tbody>';
	print '</table>';
	*/
?>
