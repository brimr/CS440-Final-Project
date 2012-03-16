<?php
	require "db_connect.php";

	$OSU_ID = $_POST["OSU_ID"];
	$OSU_ID = mysql_real_escape_string( $OSU_ID );
	
	$First_Name = $_POST["First_Name"];
	$First_Name = mysql_real_escape_string( $First_Name );
	
	$Last_Name = $_POST["Last_Name"];
	$Last_Name = mysql_real_escape_string( $Last_Name );
	
	$Middle_Initial = $_POST["Middle_Initial"];
	$Middle_Initial = mysql_real_escape_string( $Middle_Initial );
	
	$BirthDate = $_POST["BirthDate"];
	$BirthDate = mysql_real_escape_string( $BirthDate );
	
	$Gender = $_POST["Gender"];
	$Gender = mysql_real_escape_string( $Gender );
	
	$Ethnicity = $_POST["Ethnicity"];
	$Ethnicity = mysql_real_escape_string( $Ethnicity );
	
	if( $OSU_ID == '' ) {
		$result = array('success' => false, 'message' => "Blank OSU_ID");
		print json_encode($result);
		return;
	}
	
	if( $BirthDate == '' ) {
		$result = array('success' => false, 'message' => "Blank Birthdate");
		print json_encode($result);
		return;
	}
	
	$termCourseQuery = 	"UPDATE STUDENT 
						SET First_Name = '{$First_Name}', 
						Last_Name = '{$Last_Name}', 
						Middle_Initial = '{$Middle_Initial}', 
						Birthdate = '{$BirthDate}', 
						Gender = '{$Gender}', 
						Ethnicity = '{$Ethnicity}'
						WHERE OSU_ID = '{$OSU_ID}'";
	
	$termCourseResults = mysql_query( $termCourseQuery );
	$error = mysql_error();
	
	if( !$termCourseResults ) {
		$result = array('success' => false, 'message' => "{$error}");
		print json_encode($result);
	}
	else
	{
		$result = array('success' => true, 'message' => "");
		print json_encode($result);
	}
	
?>