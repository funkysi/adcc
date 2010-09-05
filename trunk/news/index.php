<?php 
	$title=" - News"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="new";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">News </h2>
<?php 
	$ans=array();
	$i=0;
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
		
	$pageNum = 1;
	$rowsPerPage = 1;
	if(isset($_GET['id']))
	{
		$pageNum = $_GET['id'];
	}
	$query   = "SELECT COUNT(*) AS numrows FROM content where page ='news' and additional = 0 ";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
	
	if ($pageNum>$numrows) $pageNum=$numrows;
	$offset = ($pageNum - 1); # $rowsPerPage
	$s = ceil($numrows/$rowsPerPage);
	$maxPage = (($s-1)*$rowsPerPage)+1;
	
	$sql = "SELECT * FROM content where page ='news' and additional = 0 order by date desc limit $offset, $rowsPerPage";
	
	#execute the query
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	if ($pageNum > 1)
	{
		$page = $pageNum - 1;
		$prev = " [<a href=\"http://".$_SERVER["SERVER_NAME"]."/news/$page/\">Prev</a>] ";
		$first = " [<a href=\"http://".$_SERVER["SERVER_NAME"]."/news/1/\">First Page</a>] ";
	}
	else
	{
		$prev  = '[Prev]  ';       // we're on page one, don't enable 'previous' link
		$first = '[First Page]  '; // nor 'first page' link
	}
	
	// print 'next' link only if we're not
	// on the last page
	if ($pageNum < $maxPage)
	{
		$page = $pageNum + 1;
		$next = " [<a href=\"http://".$_SERVER["SERVER_NAME"]."/news/$page/\">Next</a>]";
		$last = " [<a href=\"http://".$_SERVER["SERVER_NAME"]."/news/$maxPage/\">Last Page</a>] ";
	}
	else
	{
		$next = '[Next] ';      // we're on the last page, don't enable 'next' link
		$last = '[Last Page]  '; // nor 'last page' link
	}
?>

<?php
	echo "<p><span class=\"first\">".$first ."</span><span class=\"prev\">". $prev ." </span> <span class=\"next\"> ". $next ."</span><span class=\"last\">". $last."</span></p>";
	
	#loop through all records
	while ( $row = mysql_fetch_array( $rs ) )
	{
		if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) echo "<ul><li class=\"first padding\"><a href=\"http://".$_SERVER["SERVER_NAME"]."/news/new_edit.php?id=".$row['id']."&pid=$pageNum\">Edit Page</a></li><li class=\"prev padding\"><a href=\"http://".$_SERVER["SERVER_NAME"]."/news/new_insert.php\">Insert New</a></li><li class=\"next padding\"><a href=\"http://".$_SERVER["SERVER_NAME"]."/news/new_delete.php?id=".$row['id']."&pid=".$pageNum."\">Delete</a></li></ul>";
		$text=$row['text'];
		$text=str_replace("\n","<br/>",$text);
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
			echo "<p class=\"\">".$text."</p>";
			if ($row['link']!="")
				echo "<p class=\"\"><a href=\"".$row['link']."\">Click Here</a></p>";
			echo "</div>";
		}
		else if ($row['image']!="")
		{
			echo "<div class=\"padding clearfix\"><div class=\"left\"><p class=\"newimage\"><a href=\"http://".$_SERVER["SERVER_NAME"]."/".str_replace('photos','580',$row['image'])."\"><img alt=\"".$row['title']."\" src=\"http://".$_SERVER["SERVER_NAME"]."/".str_replace('photos','250',$row['image'])."\" /></a></p><p class=\"imagetitle middle\">".$row['title']."</p></div>";
			echo "<p class=\"\">".$text."</p>";
			if ($row['link']!="")
				echo "<p class=\"\"><a href=\"".$row['link']."\">Click Here</a></p>";
			echo "</div>";
		}
		
		echo"";
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
			
			echo "<div class=\"padding clearfix\"><div class=\"left\"><p class=\"newimage\"><a href=\"http://".$_SERVER["SERVER_NAME"]."/".str_replace('photos','580',$row['image'])."\"><img  alt=\"".$row['title']."\" src=\"http://".$_SERVER["SERVER_NAME"]."/".str_replace('photos','250',$row['image'])."\" /></a></p><p class=\"imagetitle middle\">".$row['title']."</p></div>";
			echo "<p class=\"\">".$text."</p>";
			if ($row['link']!="")
				echo "<p class=\"\"><a href=\"".$row['link']."\">Click Here</a></p>";
			echo "</div>";
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
<?php 


?>