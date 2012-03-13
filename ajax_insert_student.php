<?php
	require "db_connect.php";

	$OSU_ID = $_POST["OSU_ID"];
	$First_Name = $_POST["First_Name"];
	$Last_Name = $_POST["Last_Name"];
	$Middle_Initial = $_POST["Middle_Initial"];
	$BirthDate = $_POST["BirthDate"];
	$Gender = $_POST["Gender"];
	$Ethnicity = $_POST["Ethnicity"];
	
	$termCourseQuery = 	"INSERT INTO STUDENT 
						VALUES ( '{$OSU_ID}', '{$First_Name}', '{$Last_Name}', 
						'{$Middle_Initial}', '{$BirthDate}', '{$Gender}', '{$Ethnicity}')";
	
	$termCourseResults = mysql_query( $termCourseQuery );

	if( !$termCourseResults ) {
		print "QUERY FAILED: " . $termCourseQuery;
	}
	
	print '{"success":"true"}';
	
?>