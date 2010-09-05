<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$id = $_GET['id'];
	$tag = $_GET['tag'];$type = $_GET['type'];
	
	$sql = "select id from tags where tag='$tag'";
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	$row = mysql_fetch_array($rs, MYSQL_ASSOC);
	$tid = $row['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
	sendemail("deltag",$id,$tag);
	$sql = "delete from imageJtag where image='$id' and tag='$tid'";
	$rs = mysql_query($sql) or die ("Could not execute SQL query");
	header("Location:all_gall_edit.php?type=$type");
?>