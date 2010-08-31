<?php
if(isset($_POST['location']))
	{
	    $location = $_POST['location'];
	}
	if(isset($_POST['user']))
	{
	    $user = $_POST['user'];
	}
	#echo $user." - ".$page;
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$sql= "select * from  permission where userid = '$user' and location = '$location'";
	$num=mysql_numrows(mysql_query($sql));
	if($num==1)
	{
		$query= "delete from permission where userid = '$user' and location = '$location'";
		mysql_query($query);
	}	
	header("Location:permission.php?user=$user");
	
?>