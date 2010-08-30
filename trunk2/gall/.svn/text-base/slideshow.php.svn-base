<?php
	$status=1;
	if(isset($_GET['status']))
	{
		$status = $_GET['status'];
	}
	if(isset($_GET['image']))
	{
		$image = $_GET['image'];
	}	
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	#create the SQL query
	$query2   = "SELECT COUNT(*) AS numrows FROM image_store order by date desc";
	$result2  = mysql_query($query2) or die('Error, query failed');
	$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
	$numrows2 = $row2['numrows'];

	$sql2 = "select * from image_store order by date desc";

	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );

	while ( $row2 = mysql_fetch_array( $rs2 ) )
	{
		$file = $row2['image'];
		$title = $row2['caption'];
		$author = $row2['name'];
		$author_id = $row2['author_id'];
		$authors[] = $author;
		$photos[] = $file;
		$titles[] = $title;
		$id[] = $author_id;
	}

	if ($photos == null) $title = "There are no pictures in this directory!  ";

	if (file_exists('title.txt')) 
	{ 
	    $title_file = file('title.txt'); 
	    $title = $title.$title_file[0];
	}

	else $title = $title."Slideshow";
   
	$num_pics = count($photos);

	if (empty($image)) $image = '0';

	if (($image == $num_pics) || ($image > $num_pics)) $image = '0';

	$next = $image + 1;

	if ($image == '0') $prev = $num_pics - 1;
	else $prev = $image - 1;

/*******************************************************************************
                                   PRINT HTML
 ******************************************************************************/

print <<< PRINT_PAGE
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
<meta name="keywords" content="Arnold, District, Camera, club, adcc, photography, photo, snapshot, Pond Hills Lane, Greg Foster, Tony Mann">
<title>ADCC: Arnold &amp; District Camera Club - Gallery - $titles[$image] by $authors[$image]</title>
<meta name="description" content="Arnold & District Camera Club. The club is based in the town of Arnold, approximately five miles north of Nottingham city centre.
We are a group of amateur photographers and enthusiasts dedicated to promoting photography within our area. Our members range in skill from the beginner to the
accomplished amateur.">
<meta name="Author" content="Simon Foster">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
PRINT_PAGE;

	if($status==1) echo "<meta http-equiv=\"refresh\" content=\"5; url=slideshow.php?image=$next&amp;status=$status\" >";
	if($status==0) echo "";
	
print <<< PRINT_PAGE
<link href="/css/slide.css" rel="stylesheet" title="ADCC style sheets" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico" />
</head>
<body>
<div class="middle">
<h3>$titles[$image] by $authors[$image] <span class="tiny">($next of $num_pics)</span></h3>
<a href="../gall/1/$id[$image]/">
PRINT_PAGE;

	echo "<img alt=\"$titles[$image]\" src=\"../../../".str_replace('photos','740',$photos[$image])."\"></a>";
	
print <<< PRINT_PAGE
<br />
<p><a href="?image=$prev">&laquo; prev</a> | <a href="../gall/">Back to Gallery Home Page</a> | <a href="?image=$next">next &raquo;</a></p>
PRINT_PAGE;

	if($status==1) echo"<a href=\"?image=$image&amp;status=0\">Stop</a>";
	if($status==0) echo"<a href=\"?image=$image&amp;status=1\">Start</a>";
	
print <<< PRINT_PAGE
</div>
</body>
</html>
PRINT_PAGE;
?>
