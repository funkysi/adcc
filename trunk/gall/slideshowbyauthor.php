<?php

// Slideshow v1.1 by Justin Blanton (justin@justinblanton.com)
// Last modified 07.04.2007

/*******************************************************************************
                                    INSTALL
 *******************************************************************************

 1.) Create a directory of pictures numbered sequentially (i.e., 00.jpg, 01.jpg,
     etc., or any other naming scheme that specifies the order in which you want
     the images to appear).
 2.) Create a text file and on the first line put the title of the slideshow for
     this particular directory of pictures.  Name the file "title.txt" and 
     place it in the directory containing the pictures.
 3.) Modify the HTML in slideshow.php.txt; see below.
 4.) Rename slideshow.phps to slideshow.php and place it in the directory
     containing the pictures.
 5.) Point to slideshow.php from a web browser.
     
 *******************************************************************************
                                MODIFY YOUR HTML
 *******************************************************************************
 
 You'll want to use your own markup in the "PRINT HTML" section (see below) so 
 that it corresponds to your site design preferences.  I've left my actual
 template intact so that you can see how easy it is to make the necessary 
 changes.  It should be fairly simple to figure out the variables used in the
 markup and their meanings, but I'm going to list them here just in case
 someone is confused:
 
    $title    = the title of the slideshow (found in title.txt; see above)
    $num_pics = the total number of images in the current directory
    $photos   = array containing the names of the images
    $image    = index into photos array
    $prev     = the previous displayed image
    $next     = the next image to be displayed
                also used to specify the number of the current image displayed
    
 *******************************************************************************
                                  CODE SECTION
 ******************************************************************************/
$status=1;
if(isset($_GET['status']))
	{
		$status = $_GET['status'];
	}

if(isset($_GET['image']))
	{
		$image = $_GET['image'];
	}
$authorid = $_GET['author'];
include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

#create the SQL query
$query2   = "SELECT COUNT(*) AS numrows FROM image_store where author_id = '$authorid' order by date desc";
$result2  = mysql_query($query2) or die('Error, query failed');
$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
$numrows2 = $row2['numrows'];

$sql2 = "select * from image_store where author_id = '$authorid' order by date desc";

$rs2 = @mysql_query( $sql2 )
		or die( "Could not execute SQL query" );

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
// look for picture files in current directory and add them to photos array
//$current_dir = opendir("photos/");
//while ($file = readdir($current_dir)) {
 //   if (eregi("(\.jpg|\.gif|\.png)$", $file)) $photos[] = $file;
//}
//closedir($current_dir);

// check to see if images were found in directory; if no images were found,
// alert user through $title on webpage
if ($photos == null) $title = "There are no pictures in this directory!  ";
// images were found; sort them
//else sort($photos);

// read title of slideshow from title.txt
if (file_exists('title.txt')) { 
    $title_file = file('title.txt'); 
    $title = $title.$title_file[0];
}
// no title.txt file was found; alert user through $title on webpage
else $title = $title."Slideshow";
   
// get total number of pictures 
$num_pics = count($photos);

// if image number is not specified, set it to the first image
if (empty($image)) $image = '0';

// if user is on the last image or if the image number specified is greater than
// the number of pics available in the directory, start user at first image
if (($image == $num_pics) || ($image > $num_pics)) $image = '0';

// setup the link for the next image
$next = $image + 1;

// setup the link for the previous image
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
if($status==1) echo "<meta http-equiv=\"refresh\" content=\"5; url=slideshowbyauthor.php?image=$next&status=$status&author=$authorid\" >";
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
echo "<img src=\"../../../".str_replace('photos','740',$photos[$image])."\"></a>";
print <<< PRINT_PAGE
<br />
<p><a href="?image=$prev">&laquo; prev</a> | <a href="../gall/">Back to Gallery Home Page</a> | <a href="?image=$next">next &raquo;</a></p>
PRINT_PAGE;
if($status==1) echo"<a href=\"?image=$image&status=0&author=$authorid\">Stop</a>";
if($status==0) echo"<a href=\"?image=$image&status=1&author=$authorid\">Start</a>";
print <<< PRINT_PAGE
</div>
</body>
</html>
PRINT_PAGE;
?>
