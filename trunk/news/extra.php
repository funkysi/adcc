<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$query="insert into content (page,additional) values ('news','$id')";
	mysql_query($query);
	header("Location:new_edit.php?id=$id");
?>