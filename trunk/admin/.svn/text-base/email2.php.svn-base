<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$email=$_REQUEST['email'];
	$sql = "update config set setting='$email' where name='email'";
    $rs = mysql_query($sql) or die ("Could not execute SQL query");
	$class="Email Change";
	$sub="Notification email changed to ".$email;
	$date=date("Y-m-d H:i:s");
	include_once '../rss/xml_changes.php';
	header("Location:email.php");
	
?>
