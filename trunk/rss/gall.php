<?php
	header("Content-Type: text/xml;charset=iso-8859-1");  //setup xml header 

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';  //connect to db
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	$url = getconfig('url');
	echo '<?xml version="1.0" encoding="UTF-8"?>  
	<rss version="2.0"> <channel>
 <title>Arnold &amp; District Camera Club: Gallery</title>
 <link>'.$url.'gall/</link>
 <description>Arnold &amp; District Camera Club. The club is based in the town of Arnold, approximately five miles north of Nottingham city centre. 
We are a group of amateur photographers and enthusiasts dedicated to promoting photography within our area. Our members range in skill from the beginner to the 
accomplished amateur.</description>
 <language>en-gb</language>
 <image> 
<url>'.$url.'imgs/site/adccnew_ie6.png</url> 
<title>Title of image</title> 
<link>'.$url.'gall/</link> 
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



	$num_rows = mysql_num_rows(mysql_query("select * from image_store order by date desc"));     
  
	//select them and put them into a dataset called $result   
	$query = "select * from image_store order by date desc" ;   
	$result = mysql_query($query) or die("Query failed");
	for($i=0;$i<$num_rows; $i++)   
	{
		$url_product = $url.'image/'.mysql_result($result,$i,"author_id")."/".mysql_result($result,$i,"id")."/";  
$datetime = mysql_result($result,$i,"date"); //the date stored   
	  
		$year = substr($datetime, 0, 4);
$month = substr($datetime,5,2);
$day = substr($datetime, 8,2);
$hour = substr($datetime, 11,2);
$min = substr($datetime, 14,2);
$sec = substr($datetime, 17,2);
$orgdate=date("D, d M Y H:i:s O", mktime($hour,$min,$sec,$month,$day,$year));
		echo   
	    '  
	        <item>   
	        <title>'.str_replace('&','&amp;',mysql_result($result,$i,"caption")).' - '.mysql_result($result,$i,"name").'</title>   
	        <link>'.$url_product.'</link>   
	        <description>&#60;img src="'.$url."imgs/".str_replace('../imgs/photos','250',mysql_result($result,$i,"image")). '" />&#60;br />'.htmlspecialchars(strip_tags(mysql_result($result,$i,"info"))).'</description>   
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
