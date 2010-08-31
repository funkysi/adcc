<?php
	$page="competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$imageid = $_POST['image'];
	

	$sql = "update entries set imageid='$imageid' where id='$id' ";
	$rs = mysql_query($sql) or die ("Could not execute SQL query");
	header("Location:entries_edit.php?id=$id&cid=$cid");

?>