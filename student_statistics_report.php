<?php
    require "db_connect.php";

    
    $initAge    = "SELECT DISTINCT YEAR(Birthdate) FROM STUDENT ORDER BY YEAR(Birthdate) DESC;";
    $initEth    = "SELECT DISTINCT Ethnicity FROM STUDENT ORDER BY Ethnicity DESC;";
    $initYears  = "SELECT DISTINCT YEAR(Date) FROM EVENT WHERE Description='Enrolled' ORDER BY YEAR(Date) ASC;
";
    //Initialize the arrays to the right lengths and with all fields present in the db
    $initYears = query_db($initYears);
    $years = array();
    while($temp = mysql_fetch_array($initYears))
        array_push( $years, $temp[0] );

    $initAge = query_db($initAge);
    $age = array();
    while($temp = mysql_fetch_array($initAge))
         array_push( $age, (date("Y") - $temp[0]) );

    $initEth = query_db($initEth);
    $ethnicity = array();
    while($temp = mysql_fetch_array($initEth))
        array_push( $ethnicity, $temp[0] );

    $gender = array("M", "F");

    $totalQuery  = "SELECT YEAR(Date), COUNT(YEAR(Date)) AS total 
                FROM (STUDENT RIGHT JOIN EVENT ON STUDENT.OSU_ID=EVENT.Student_ID)
                WHERE Description='Enrolled' GROUP BY YEAR(Date);";
    $totalQuery = query_db($totalQuery);

    $total = array();
    while( $temp = mysql_fetch_array($totalQuery) )
        $total[$temp["YEAR(Date)"]] = $temp["total"];



    $ethStat = getStat("Ethnicity");
    $ageStat = getStat("YEAR(Birthdate)");
    $genStat = getStat("Gender");


    print '<table class="table table-striped table-bordered table-condensed">';
    print '<thead><tr><th>&nbsp;</th>';
    foreach($years as $year)
    {
        print"<th>{$year}</th>";
    }
    

    print '<tbody>';
    
    foreach($ethnicity as $eth)
    {
        print "<tr><td>{$eth}</td>";
        foreach($years as $year)
        {
            print "<td>";
            print toPercent($ethStat[$year][$eth], $total[$year]);
            print "</td>";
        }
        print '</tr>';
    }
    foreach($age as $ag)
    {
        print "<tr><td>{$ag}</td>";
        foreach($years as $year)
        {
            print "<td>";
            print toPercent($ageStat[$year][$ag], $total[$year]);
            print"</td>";
        }
        print '</tr>';
    }
    foreach($gender as $gen)
    {
        print "<tr><td>{$gen}</td>";
        foreach($years as $year)
        {
            print "<td>";
            print toPercent($genStat[$year][$gen], $total[$year]);
            print "</td>";
        }
        print '</tr>';
    }
    print '</tbody>';
    print '</table>';

    function toPercent($value, $total)
    {
        if($value == 0)
            return "";
        $ret = round(($value * 100 / $total), 2);
        return "{$ret}%";
    }

    function getStat($cat)
    {
        $percent    = "SELECT YEAR(Date), {$cat}, COUNT({$cat}) AS amount 
                    FROM (STUDENT RIGHT JOIN EVENT ON STUDENT.OSU_ID=EVENT.Student_ID) 
                    WHERE Description='Enrolled' GROUP BY YEAR(Date), {$cat};";
        $percent = query_db($percent);

        $data = array(array(array()));
        while( $temp = mysql_fetch_array($percent) )
        {
            if($cat == "YEAR(Birthdate)")
                $data[$temp["YEAR(Date)"]][date("Y") - $temp["{$cat}"]] = $temp["amount"];
            else
                $data[$temp["YEAR(Date)"]][$temp["{$cat}"]] = $temp["amount"];

        }
        return $data;

    }

    

function query_db($queryString)
{
    $result = mysql_query($queryString);
    if( !$result ) {
        print "QUERY FAILED: {$result}";
    }
    return $result;
}
?>
