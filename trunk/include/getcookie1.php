<?php 
	$auth = $_COOKIE['auth_new'];
	$level = $_COOKIE['level_new'];
	#header( "Cache-Control:no-cache");
	if ($level !="0")
	{
		header( "Location:../admin/index.php" ); exit();
	}
?>