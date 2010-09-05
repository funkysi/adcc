<?php 

	$query = "SELECT COUNT(*) AS numrows FROM content where page ='news' and additional = 0";
    $result = mysql_query($query) or die('Error, query failed');
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
    $sql = "SELECT * FROM content where page ='news' and additional = 0 order by date desc limit 1";

	#execute the query
	$rs = @mysql_query($sql) or die("Could not execute SQL query");

	#loop through all records
	while ($row=mysql_fetch_array($rs))
	{
		$text=$row["text"];
		$text=str_replace("\n","<br/>",$text);
		$datetime = $row["date"];
        $year     =substr($datetime, 0, 4);
        $month    =substr($datetime, 5, 2);
        $day      =substr($datetime, 8, 2);
        $hour     =substr($datetime, 11, 2);
        $min      =substr($datetime, 14, 2);
        $sec      =substr($datetime, 17, 2);
        $orgdate  =date("l jS F Y", mktime($hour, $min, $sec, $month, $day, $year));

        echo "<div class=\"news-section\"><h2 class=\"bold\">News: <a class=\"red\" href=\"news/\">" . $orgdate . "</a></h2>";
		if($row['image']==null) 
		{
			echo "<div class=\"padding clearfix\">";
			echo "<p class=\"\">".$text."</p></div>";
		}
		if($row['image']!=null) 
		{
			echo "<div class=\"padding clearfix\"><div class=\"left\"><p class=\"newimage\"><a href=\"http://".$_SERVER["SERVER_NAME"]."/".str_replace('photos','580',str_replace('../','',$row['image']))."\"><img  alt=\"".$row['title']."\" src=\"http://".$_SERVER["SERVER_NAME"]."/".str_replace('photos','250',str_replace('../','',$row['image']))."\" /></a></p><p class=\"imagetitle middle\">".$row['title']."</p></div>";
			echo "<p class=\"\">".$text."</p></div>";
		}
		echo "<p><a class=\"black\" href=\"news/\">more...</a></p>";
            
	}
	
?>
</div>