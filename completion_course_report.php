<?php
	require "db_connect.php";

    $courses       = "SELECT totals.Termcode, total, passed FROM 
                        ((SELECT *, COUNT(*) as total FROM TERM_COURSE GROUP BY Termcode) as totals)
                        LEFT JOIN
                        ((SELECT *, COUNT(*) as passed FROM TERM_COURSE WHERE Completed = 'Y' GROUP BY Termcode) 
                        as passing) on totals.Termcode=passing.Termcode;";

    $courseID   = "SELECT DISTINCT Name, Academic_Year, TERM.Termcode FROM TERM_COURSE LEFT JOIN TERM ON TERM.Termcode=TERM_COURSE.Termcode ORDER BY Academic_Year Desc;
";

    $courses       = query_db($courses);

    $coursedata = array();
    while($temp = mysql_fetch_array($courses))
    {
        $temp2 = array($temp["total"],$temp["passed"]);
        $coursedata[$temp["Termcode"]] = $temp2;
    }


    $courseID      = query_db($courseID);
    $courseIDdata  = array();
    while($temp =  mysql_fetch_array($courseID))
    {
        $temp2 = array($temp["Academic_Year"],$temp["Name"]);
        $courseIDdata[$temp["Termcode"]] =$temp2;
    }

    print '<table class="table table-striped table-bordered table-condensed">';
    print '<thead><th>Year</th><th>Term</th><th>Classes Taken</th><th>Classes Passed</th><th>Pass rate</th>';
    print '<tbody>';
    foreach($courseIDdata as $key => $value)
    {
        print "<tr><td>{$value[0]}</td><td>{$value[1]}</td><td>{$coursedata[$key][0]}</td><td>{$coursedata[$key][1]}</td>";
        print '<td>';
        print toPercent($coursedata[$key][1], $coursedata[$key][0]);
        print "</td></tr>";
    }
    print '</tbody>';
    print '</table>';


?>