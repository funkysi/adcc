<?php
	header("Content-Type: text/xml;charset=iso-8859-1");  //setup xml header 

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';  //connect to db
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	$url = getconfig('url');
	echo '<?xml version="1.0" encoding="UTF-8"?>  
	<rss version="2.0"> <channel>
 <title>Arnold &amp; District Camera Club: Changes</title>
 <link>'.$url.'</link>
 <description>Arnold &amp; District Camera Club. The club is based in the town of Arnold, approximately five miles north of Nottingham city centre. 
We are a group of amateur photographers and enthusiasts dedicated to promoting photography within our area. Our members range in skill from the beginner to the 
accomplished amateur.</description>
 <language>en-gb</language>
 <image> 
<url>'.$url.'imgs/adccnew_ie6.png</url> 
<title>Title of image</title> 
<link>'.$url.'</link> 
<width>50</width> 
<height>150</height> 
<description>This is my cool image for my feed</description> 
</image> 
<lastBuildDate>'.date("D, m M Y G:i:s O").'</lastBuildDate>';  //first line of xml file
	$thisyear = date("Y"); //work out this year   
    $thismonth  = date("m"); //work out the month   
    $today  = date("d"); //work out today 
	$displaydate = ''.$thisyear.'-'.$thismonth.'-'.$today.'';
//Sun, 06 Jul 2008 18:35:19 +0100



	$num_rows = mysql_num_rows(mysql_query("select * from log order by date desc"));     
  
	//select them and put them into a dataset called $result   
	$query = "select * from log order by date desc" ;   
	$result = mysql_query($query) or die("Query failed");
	for($i=0;$i<$num_rows; $i++)   
	{
		$url_product = $url;  
$datetime = mysql_result($result,$i,"date"); //the date stored   
	  
		$year = substr($datetime, 0, 4);
$month = substr($datetime,5,2);
$day = substr($datetime, 8,2);
$hour = substr($datetime, 10,2);
$min = substr($datetime, 10,2);
$sec = substr($datetime, 10,2);
$orgdate=date("D, d M Y H:i:s O", mktime($hour,$min,$sec,$month,$day,$year));
		echo   
	    '  
	        <item>   
	        <title>'.str_replace('&','&amp;',mysql_result($result,$i,"subject")).'</title>   
	        <link>'.$url_product.'</link>   
	        <description>'.htmlspecialchars(strip_tags(mysql_result($result,$i,"message"))).'</description>   
	        <pubDate>'.$orgdate.'</pubDate>
			<guid>'.$url_product.'</guid>
	        </item>   
	    '; 
	}

	
	mysql_close(); //close connection   
  
	//close the XML attribute that we opened in #3   
	echo  
	'</channel></rss>';   
?>
