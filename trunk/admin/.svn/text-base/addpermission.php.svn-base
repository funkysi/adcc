<?php
if(isset($_POST['page']))
	{
	    $page = $_POST['page'];
	}
	if(isset($_POST['user']))
	{
	    $user = $_POST['user'];
	}
	#echo $user." - ".$page;
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$sql= "select * from  permission where userid = '$user' and location = '$page'";
	$num=mysql_numrows(mysql_query($sql));
	if($num==0 and $page!='gall')
	{
		$query= "insert into permission set userid = '$user', location = '$page', level = '1'";
		mysql_query($query);
	}
	if($num==0 and $page=='gall')
	{
		$query= "insert into permission set userid = '$user', location = '$page', level = '1'";
		mysql_query($query);
	}
	if($num==1 and $page=='gall')
	{
		$query= "update permission set level = '2' where userid = '$user' and location = '$page'";
		mysql_query($query);
	}
	header("Location:permission.php?user=$user");
?>