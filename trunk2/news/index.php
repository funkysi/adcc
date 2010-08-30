<?php 
	#if($_SERVER["REQUEST_URI"]=="/news/index.php" or $_SERVER["REQUEST_URI"]=="/news/") header("Location:/news/");
	$title=" - News"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="new";
	$page="news";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	#include_once "markdown.php";
		
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">News </h2>
<?php 
	$i=0;
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$pageNum = 1;
	$rowsPerPage = 1;
	if(isset($_GET['id']))
	{
		$pageNum = $_GET['id'];
	}
	if(isset($_GET['year']))
	{
		$year = $_GET['year'];
	}
	if(isset($_GET['month']))
	{
		$month = $_GET['month'];
	}
	if(isset($_GET['day']))
	{
		$day = $_GET['day'];
	}
	$date=$year."-".$month."-".$day;
	$first = "Select * from content where page = 'news' and additional = 0 and date like '$year%$month%$day%' order by date desc limit 1";
	$rs = mysql_query( $first ) or die( "Could not execute SQL query".$first );
	while ( $row = mysql_fetch_array( $rs ) )
	{
		$datetime=$row["date"];
		if(!isset($year)) $year = substr($datetime, 0, 4);
		if(!isset($month)) $month = substr($datetime,5,2);
		if(!isset($day)) $day = substr($datetime, 8,2);
	}
	$date=$year."-".$month."-".$day;	
	$query   = "SELECT COUNT(*) AS numrows FROM content where page ='news' and additional = 0 ";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
	
	if($numrows>0)
	{
		$mysql = mysql_query('set @rank=0') or die('rank');
		$sql2 = "select * from (SELECT @rank:=@rank+1 as rank,id,text,image,date,title FROM content where page ='news' and additional = 0 order by date) as result where date like '$date%'";

		$rs = mysql_query( $sql2 ) or die( "Could not execute SQL query".$sql2 );
	
		#loop through all records
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$rank=$row['rank'];
		}
		$prev=$rank+1;
		$next=$rank-1;
		$mysql = mysql_query('set @rank=0') or die('rank');
		$sql3 = "select * from (SELECT @rank:=@rank+1 as rank,text,date FROM content where page ='news' and additional = 0 order by date) as result where rank = '$next'";
		$rs = mysql_query( $sql3 ) or die( "Could not execute SQL query".$sql3 );
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$datetime=$row["date"];
			$nextyear = substr($datetime, 0, 4);
			$nextmonth = substr($datetime,5,2);
			$nextday = substr($datetime, 8,2);
		}
		$mysql = mysql_query('set @rank=0') or die('rank');
		$sql4 = "select * from (SELECT @rank:=@rank+1 as rank,text,date FROM content where page ='news' and additional = 0 order by date) as result where rank = '$prev'";
		$rs = mysql_query( $sql4 ) or die( "Could not execute SQL query".$sql4 );
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$datetime=$row["date"];
			$prevyear = substr($datetime, 0, 4);
			$prevmonth = substr($datetime,5,2);
			$prevday = substr($datetime, 8,2);
		}
		$first = "Select * from content where page = 'news' and additional = 0 order by date desc limit 1";
		$rs = mysql_query( $first ) or die( "Could not execute SQL query".$first );
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$datetime=$row["date"];
			$firstyear = substr($datetime, 0, 4);
			$firstmonth = substr($datetime,5,2);
			$firstday = substr($datetime, 8,2);
		}
		$last = "Select * from content where page = 'news' and additional = 0 order by date asc limit 1";
		$rs = mysql_query( $last ) or die( "Could not execute SQL query".$last );
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$datetime=$row["date"];
			$lastyear = substr($datetime, 0, 4);
			$lastmonth = substr($datetime,5,2);
			$lastday = substr($datetime, 8,2);
		}
		if(isset($nextyear))
		$next = "<a href=\"http://".$_SERVER["HTTP_HOST"]."/news/$nextyear/$nextmonth/$nextday/\">Next</a>";
		else $next="";
		if(isset($prevyear))
		$prev = "<a href=\"http://".$_SERVER["HTTP_HOST"]."/news/$prevyear/$prevmonth/$prevday/\">Prev</a>";
		else $prev="";
		if(isset($prevyear))
		$first = "<a href=\"http://".$_SERVER["HTTP_HOST"]."/news/$firstyear/$firstmonth/$firstday/\">First</a>";
		else $first="";
		if(isset($nextyear))
		$last = "<a href=\"http://".$_SERVER["HTTP_HOST"]."/news/$lastyear/$lastmonth/$lastday/\">Last</a>";
		else $last="";
		echo "<p><span class=\"first firsticon\">".$first ."</span><span class=\"prev previcon\">". $prev ."</span><span class=\"next nexticon\">". $next ."</span><span class=\"last lasticon\">". $last."</span></p>";

		$mysql = mysql_query('set @rank=0') or die('rank');
		$sql2 = "select * from (SELECT @rank:=@rank+1 as rank,id,text,image,date,title,link FROM content where page ='news' and additional = 0 order by date) as result where date like '$date%'";

		$rs = mysql_query( $sql2 ) or die( "Could not execute SQL query".$sql2 );
	
		#loop through all records
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$rank=$row['rank'];
			if($perm==true ) echo "<ul><li class=\"first padding edit\"><a href=\"http://".$_SERVER["HTTP_HOST"]."/news/new_edit.php?id=".$row['id']."&amp;pid=$pageNum&amp;PrevUrl=".curPageURL()."\">Edit Page</a></li><li class=\"prev padding add\"><a href=\"http://".$_SERVER["HTTP_HOST"]."/news/new_insert.php\">Insert New</a></li><li class=\"next padding delete\"><a href=\"http://".$_SERVER["HTTP_HOST"]."/news/new_delete.php?id=".$row['id']."&amp;pid=".$pageNum."\">Delete</a></li></ul>";
			$text=$row['text'];
		
			#$text = Markdown($text);
			$text=str_replace("\n\n","<br/>",$text);
			$datetime=$row["date"];
			$year = substr($datetime, 0, 4);
			$month = substr($datetime,5,2);
			$day = substr($datetime, 8,2);
			$hour = substr($datetime, 11,2);
			$min = substr($datetime, 14,2);
			$sec = substr($datetime, 17,2);
			$orgdate=date("l jS F Y", mktime($hour,$min,$sec,$month,$day,$year));
			srand(microtime()*1000000);
			echo "<div class=\"red bold padding\">".$orgdate."</div>";
			$id=$row['id'];
			$num=rand(1,2);
			if ($row['image']=="")
			{
				echo "<div class=\"padding clearfix\">";
				echo $text;
				if ($row['link']!="")
				echo "<p class=\"\"><a href=\"".$row['link']."\">Click Here</a></p>";
				echo "</div>";
			}
			else if ($row['image']!="")
			{
				echo "<div class=\"padding clearfix\"><div class=\"left\"><p class=\"newimage\"><a href=\"http://".$_SERVER["HTTP_HOST"]."/".str_replace('photos','580',$row['image'])."\"><img alt=\"".$row['title']."\" src=\"http://".$_SERVER["HTTP_HOST"]."/".str_replace('photos','250',$row['image'])."\" /></a></p><p class=\"imagetitle middle\">".$row['title']."</p></div>";
				echo $text;
				if ($row['link']!="")
				echo "<p class=\"\"><a href=\"".$row['link']."\">Click Here</a></p>";
				echo "</div>";
			}
		
			echo"";

			$prev=$rank+1;
			$next=$rank-1;
		}
		$sql2 = "SELECT * FROM content where page ='news' and additional ='$id' ";
		$rs = @mysql_query( $sql2 ) or die( "Could not execute SQL2 query" );
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$text=$row['text'];
			$text=str_replace("\n","<br/>",$text);
			if ($row['image']=="")
			{
				echo "<div class=\"padding clearfix\">";
				echo "<p class=\"\">".$text."</p>";
				if ($row['link']!="")
				echo "<p class=\"\"><a href=\"".$row['link']."\">Click Here</a></p>";
				echo "</div>";	
			}	
			else if ($row['image']!="")
			{
				echo "<div class=\"padding clearfix\"><div class=\"left\"><p class=\"newimage\"><a href=\"http://".$_SERVER["HTTP_HOST"]."/".str_replace('photos','580',$row['image'])."\"><img  alt=\"".$row['title']."\" src=\"http://".$_SERVER["HTTP_HOST"]."/".str_replace('photos','250',$row['image'])."\" /></a></p><p class=\"imagetitle middle\">".$row['title']."</p></div>";
				echo "<p class=\"\">".$text."</p>";
				if ($row['link']!="")
				echo "<p class=\"\"><a href=\"".$row['link']."\">Click Here</a></p>";
				echo "</div>";
			}
		}
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>


