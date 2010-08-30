<?php
	$page="news";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	$id=$_GET['id'];
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$query="insert into content (page,additional) values ('news','$id')";
	mysql_query($query);
	header("Location:new_edit.php?id=$id");
?>