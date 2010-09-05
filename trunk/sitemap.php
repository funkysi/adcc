<?php
	header("Content-Type: text/xml;charset=iso-8859-1");  //setup xml header 

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';  //connect to db
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	$url = getconfig('url');
	echo '<?xml version="1.0" encoding="UTF-8"?>  
	<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">';  //first line of xml file
	$thisyear = date("Y"); //work out this year   
    $thismonth  = date("m"); //work out the month   
    $today  = date("d"); //work out today 
	$displaydate = ''.$thisyear.'-'.$thismonth.'-'.$today.'';
	//home
	echo   
    '  
        <url>   
        <loc>'.$url.'</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.9</priority>   
        </url>   
    '; 
	echo   
    '  
        <url>   
        <loc>'.$url.'index.php</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    '; 
	echo   
    '  
        <url>   
        <loc>'.$url.'fsi.php</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    ';  
	echo   
    '  
        <url>   
        <loc>'.$url.'purpose/</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    '; 
	echo   
    '  
        <url>   
        <loc>'.$url.'membership/</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    '; 
	echo   
    '  
        <url>   
        <loc>'.$url.'committee/</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    '; 
	echo   
    '  
        <url>   
        <loc>'.$url.'location/</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    ';
	echo   
    '  
        <url>   
        <loc>'.$url.'download/</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    ';
		echo   
    '  
        <url>   
        <loc>'.$url.'links/</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    ';
	echo   
    '  
        <url>   
        <loc>'.$url.'gall/</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.9</priority>   
        </url>   
    ';
	echo   
    '  
        <url>   
        <loc>'.$url.'gall/gall_search.php</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    ';

	echo   
    '  
        <url>   
        <loc>'.$url.'gall/top10.php</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    ';
	echo   
    '  
        <url>   
        <loc>'.$url.'gall/top10new.php</loc>   
        <lastmod>'.$displaydate.'</lastmod>   
        <changefreq>daily</changefreq>   
        <priority>0.8</priority>   
        </url>   
    ';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbschedule.php';	
	$max = maxdate();
	$min = mindate();
	for($i=$min;$i<$max+1; $i++)   
	{ 
			$url_product = $url.'schedule/'.$i."/";   
		   echo   
	    '  
	        <url>   
	        <loc>'.$url_product.'</loc>   
	        <lastmod>'.$displaydate.'</lastmod>   
	        <changefreq>daily</changefreq>   
	        <priority>0.8</priority>   
	        </url>   
	    '; 
	}
	$num_rows = mysql_num_rows(mysql_query("select * from users where gall_null=0 "));     
  
	//select them and put them into a dataset called $result   
	$query = "select * from users where gall_null=0" ;   
	$result = mysql_query($query) or die("Query failed");
	for($i=0;$i<$num_rows; $i++)   
	{
		$url_product = $url.'gall/1/'.mysql_result($result,$i,"username")."/";      
		echo   
	    '  
	        <url>   
	        <loc>'.$url_product.'</loc>   
	        <lastmod>'.$displaydate.'</lastmod>   
	        <changefreq>daily</changefreq>   
	        <priority>0.8</priority>   
	        </url>   
	    '; 
	}
	$num_rows = mysql_num_rows(mysql_query("select * from users where about!='' and level=1 "));     
  
	//select them and put them into a dataset called $result   
	$query = "select * from users where about!='' and level=1" ;   
	$result = mysql_query($query) or die("Query failed");
	for($i=0;$i<$num_rows; $i++)   
	{
		$url_product = $url.'author/'.mysql_result($result,$i,"username")."/";      
		echo   
	    '  
	        <url>   
	        <loc>'.$url_product.'</loc>   
	        <lastmod>'.$displaydate.'</lastmod>   
	        <changefreq>daily</changefreq>   
	        <priority>0.8</priority>   
	        </url>   
	    '; 
	}
	$num_rows = mysql_num_rows(mysql_query("select * from image_store "));     
  
	//select them and put them into a dataset called $result   
	$query = "select * from image_store " ;   
	$result = mysql_query($query) or die("Query failed");
	for($i=0;$i<$num_rows; $i++)   
	{
		$url_product = $url.'image/'.mysql_result($result,$i,"author_id")."/".mysql_result($result,$i,"id")."/";      
		echo   
	    '  
	        <url>   
	        <loc>'.$url_product.'</loc>   
	        <lastmod>'.$displaydate.'</lastmod>   
	        <changefreq>daily</changefreq>   
	        <priority>0.2</priority>   
	        </url>   
	    '; 
	}
	$num_rows = mysql_num_rows(mysql_query("select * from tags "));     
  
	//select them and put them into a dataset called $result   
	$query = "select * from tags" ;   
	$result = mysql_query($query) or die("Query failed");
	for($i=0;$i<$num_rows; $i++)   
	{
		$url_product = $url.'gall/viewimagetag.php?tag='.mysql_result($result,$i,"tag");      
		echo   
	    '  
	        <url>   
	        <loc>'.$url_product.'</loc>   
	        <lastmod>'.$displaydate.'</lastmod>   
	        <changefreq>daily</changefreq>   
	        <priority>0.8</priority>   
	        </url>   
	    '; 
	}
	$num_rows = mysql_num_rows(mysql_query("select * from content where page='news' and additional='0'"));     
  
	//select them and put them into a dataset called $result   
	$query = "select * from content where page='news' and additional='0' order by date desc" ;   
	$result = mysql_query($query) or die("Query failed");   

     
	#$url_product = $url.'news/1/'.$thismonth."-".$today."-".$thisyear."/";
  
  
 
	//loop through the entire resultset   
	for($i=1;$i<$num_rows+1; $i++)   
	{   
	    //your url-product as we worked out in #4   
	    $url_product = $url.'news/'.$i."/".$thismonth."-".$today."-".$thisyear."/";   
	       
		/*you need to assign a date to the entity.  if you don't   
		store a timestamp in the Database then you need slapping*/  
	       
		$date = mysql_result($result,$i-1,"date"); //the date stored   
	  
		$year = substr($date,0,4); //work out the year   
		$mon  = substr($date,5,2); //work out the month   
		$day  = substr($date,8,2); //work out the day   
	       
		/*display the date in the format Google expects:  
		2006-01-29 for example*/  
	       
		$displaydate = ''.$year.'-'.$mon.'-'.$day.'';  
	                      
		//you can assign whatever changefreq and priority you like  
	    echo   
	    '  
	        <url>   
	        <loc>'.$url_product.'</loc>   
	        <lastmod>'.$displaydate.'</lastmod>   
	        <changefreq>daily</changefreq>   
	        <priority>0.8</priority>   
	        </url>   
	    ';   
       
       
	}   
	mysql_close(); //close connection   
  
	//close the XML attribute that we opened in #3   
	echo  
	'</urlset>';   
?>