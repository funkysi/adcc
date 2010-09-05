<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$realid=$_GET['id'];
	$id=$_POST['id'];
	$pid=$_POST['pid'];
	$text=$_POST['text'];
	$title=$_POST['title'];
	$delimage=$_POST['delimage'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$pword = $_POST['pword'];
	$date=$year."-".$month."-".$day." 00:00:00";
	$link=$_POST['link'];
	$image=$_POST['image'];
	$text= str_ireplace("<br>", "<br/>", $text);
	$text= str_ireplace("<BR/>", "<br/>", $text);
	$text= str_ireplace("'", "", $text);
	$text= str_ireplace("&", "and", $text);
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$unique_name = date("U").".jpg";
	if( $_FILES['image']['name'] != "" )
		{
			if((substr($_FILES['image']['name'],  -3)!="jpg" and substr($_FILES['image']['name'],  -3)!="JPG"))
			{
				header("Location:new_edit.php?id=$id&pid=$pid&status=jpg");exit();
			}
			copy ( $_FILES['image']['tmp_name'], '../imgs/photos/' . $unique_name ) or die( header("Location:new_edit.php?id=$id&pid=$pid&status=toobig") );
			$image = '../imgs/photos/' . $unique_name;
			include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
			image_resize(740,740,'740',$image);
			image_resize(100,100,'100',$image);
			image_resize(140,140,'140',$image);
			image_resize(250,250,'250',$image);
			image_resize(580,580,'580',$image);
		}
		else if( $_FILES['image']['name'] == "" )
		{
			$query   = "SELECT COUNT(*) AS numrows FROM content where additional='$id'";
			$result  = mysql_query($query) or die('Error, query failed');
			$row     = mysql_fetch_array($result, MYSQL_ASSOC);
			$numrows = $row['numrows'];

			$sql = "select * from content where additional='$id' ";

			#execute the query
			$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
			while ( $row = mysql_fetch_array( $rs ) ) 
			{
				$image = $row['image'];
			}
			if($delimage==true) $image=null;	
		}

		$query="UPDATE content SET text='$text', title='$title', date='$date', link='$link', image='$image' WHERE additional='$id' and id='$realid'";
		if( !(true) )
		{
		  
		}
		else
		{
			mysql_query($query);
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("editnews",$auth,$text,$title);
			mysql_close();
			header("Location:index.php");
		}
?>