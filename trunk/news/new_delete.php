<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$id=$_GET['id'];
	$pid=$_GET['pid'];
	$date = date("Y-m-d H:i:s");
	$type=$_COOKIE['auth_new'];
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="DELETE FROM content WHERE id='$id'";
	if( (true) )
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delnews",$auth,$id);
		mysql_query($query);

		header("Location:new_edit.php?id=$id");
		mysql_close();
	}
?>

