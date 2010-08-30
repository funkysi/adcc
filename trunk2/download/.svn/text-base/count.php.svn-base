<?php
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';
	$ans = updatecount($_GET['id']);
	$host  = $_SERVER['HTTP_HOST'];
	$id=$_GET['id'];
	header("Location: http://$host/download/$id");
?>