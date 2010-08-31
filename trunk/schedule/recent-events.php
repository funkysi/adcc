<?php
    $query="SELECT COUNT(*) AS numrows FROM schedule";
    $result=mysql_query($query) or die('Error, query failed');
    $row=mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows=$row['numrows'];
    $now=date("U");
    $sql="select * from schedule where seconds < $now order by date desc limit 1";
    $sql2="select * from schedule where seconds > $now order by date asc limit 1";
    #execute the query
    $rs  =@mysql_query($sql) or die("Could not execute SQL query");
    $rs2=@mysql_query($sql2) or die("Could not execute SQL query");

    #loop through all records
    while ($row=mysql_fetch_array($rs))
    {
        $datetime = $row["date"];
        $year     =substr($datetime, 0, 4);
        $month    =substr($datetime, 5, 2);
        $day      =substr($datetime, 8, 2);
        $hour     =substr($datetime, 11, 2);
        $min      =substr($datetime, 14, 2);
        $sec      =substr($datetime, 17, 2);
        $orgdate  =date("l jS F Y", mktime($hour, $min, $sec, $month, $day, $year));
        echo "<p class=\"bold black padding\"><a class=\"red bold\" href=\"schedule/" . $year . "/#" . $row['id'] . "\">" . $orgdate . "</a>";
        ECHO "<br/>".$row['event'] . "</p>";
	}

    while ($row=mysql_fetch_array($rs2))
    {
        $datetime = $row["date"];
        $year     =substr($datetime, 0, 4);
        $month    =substr($datetime, 5, 2);
        $day      =substr($datetime, 8, 2);
        $hour     =substr($datetime, 11, 2);
        $min      =substr($datetime, 14, 2);
        $sec      =substr($datetime, 17, 2);
        $orgdate  =date("l jS F Y", mktime($hour, $min, $sec, $month, $day, $year));
        echo "<p class=\"bold black padding\"><a class=\"red bold\" href=\"schedule/" . $year . "/#" . $row['id'] . "\">" . $orgdate . "</a><br/>";
        echo $row['event'] . "</p>";
    }
	?>