<?php
	if(!isset($_COOKIE['auth_new']))  
	{
		$auth = "";
	}
	else $auth = $_COOKIE['auth_new'];
	
	$perm = check_permissions($auth,$page);
	$permlevel = check_level($auth,$page);
	#if ($perm != true)
	#{
	#	header( "Location:../admin/index.php" ); exit();
	#}

	
	function check_permissions($auth,$location)
	{
		include_once 'connect.php';
		$ans="";
		$sql = "select count(*) as count from permission where userid = '$auth' and location = '$location'";
		$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);

		while ($row=mysql_fetch_array($rs))
		{
			$ans=$row['count'];
		}
		if($ans==1) return true;
		else return false;
	}
	function check_level($auth,$location)
	{
		include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
		$ans="";
		$sql = "select count(*) as count from permission where userid = '$auth' and location = '$location' and level = '2'";
		$rs = @mysql_query($sql) or die("Could not execute SQL query");

		while ($row=mysql_fetch_array($rs))
		{
			$ans=$row['count'];
		}
		if($ans==1) return true;
		else return false;
	}
	?>