<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';
	$id=$_GET['id'];$type=$_GET['type'];
	
	$self = $_SERVER['PHP_SELF'];
	$image = getimage($id);
	$tag = $_POST['tag'];
	$tag = str_replace(","," ",$tag);
	$tag = str_replace(";"," ",$tag);
	$tag = str_replace("."," ",$tag);
	$tag = str_replace(":"," ",$tag);
	$tag = explode(" ", $tag);
	$tag_count = count($tag);

for($k = 0; $k < $tag_count; $k++)
{

	$sql = "select count(*) as num from tags where tag='$tag[$k]'";
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	$row     = mysql_fetch_array($rs, MYSQL_ASSOC);
	$numrows = $row['num'];	
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
	sendemail("addtag",$id,$tag[$k]);
	if($numrows==0 and $tag[$k]!='')
	{
		$sql = "insert into tags (tag) values (\"$tag[$k]\")"; 
		$rs = mysql_query($sql) or die ("Could not execute SQL query");
		$sql = "select id from tags where tag='$tag[$k]'";
		$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
		$row = mysql_fetch_array($rs, MYSQL_ASSOC);
		$tid = $row['id'];	
	 	$sql = "insert into imageJtag (image,tag) values (\"$id\",\"$tid\")"; 
		$rs = mysql_query($sql) or die ("Could not execute SQL query");
		$tag[$k]=null;
		
	}
	if($numrows!=0 and $tag[$k]!='')
	{
		$sql = "select id from tags where tag='$tag[$k]'";
		$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
		$row = mysql_fetch_array($rs, MYSQL_ASSOC);
		$tid = $row['id'];	
		$sql = "select count(*) as num from imageJtag where tag='$tid' and image='$id'";
		$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
		$row = mysql_fetch_array($rs, MYSQL_ASSOC);
		$numrows = $row['num'];	
		if($numrows==0 and $tag[$k]!='')
		{
			$sql = "insert into imageJtag (image,tag) values (\"$id\",\"$tid\")"; 
			$rs = mysql_query($sql)	or die ("Could not execute SQL query");
			$tag[$k]=null;
		}
	}
	}
	header("Location:all_gall_edit.php?type=$type");
?>