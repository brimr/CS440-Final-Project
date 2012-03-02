<?php 
	function selectDistinctDropDown( $tableName, $attributeName, $pulldownName, $defaultValue, $selectClass )
	{
		$defaultWithinResultSet = FALSE;

		$distinctQuery = "SELECT DISTINCT {$attributeName} FROM {$tableName}";
		
		$resultID = mysql_query( $distinctQuery );

		if( !$resultID ) {
			die( "QUERY FAILED: " . $distinctQuery );
		}	

		print "<select class=\"{$selectClass}\" id=\"{$pulldownName}\">";
		while( $row = @ mysql_fetch_array( $resultID ) )
		{
			$result = $row[$attributeName];
			
			if( isset($defaultValue) && $result == $defaultValue )
				print "<option selected value=\"{$result}\">{$result}";
			else
				print "<option value=\"{$result}\">{$result}";
			print "</option>";
		}
		print "</select>";
	}
?>
