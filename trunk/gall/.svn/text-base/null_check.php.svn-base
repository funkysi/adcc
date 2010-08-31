<?php 
	$auth = $_COOKIE['auth_new'];
	if(!isset($type)) $type=$auth;
	
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	
	$query2   = "SELECT COUNT(*) AS numrows FROM image_store where author_id = '$type'";
	$result2  = mysql_query($query2) or die('Error, query failed');
	$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
	$numrows2 = $row2['numrows'];
	
	if($numrows2>0) 
	{
		$query="UPDATE users SET gall_null=0 WHERE username='$type'";
		mysql_query($query);
	}
	if($numrows2==0) 
	{
		$query="UPDATE users SET gall_null=1 WHERE username='$type'";
		mysql_query($query);
	}
?>
