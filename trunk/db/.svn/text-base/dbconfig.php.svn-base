<?php
function getconfig($name)
{
	include_once $_SERVER['DOCUMENT_ROOT'].'/include/connect.php';
	$ans="";
	$sql="select * from config where name='$name'";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans=$row['setting'];
						$i++;
					}
	return $ans;
}
function updateconfig($name,$setting)
{
					include_once $_SERVER['DOCUMENT_ROOT'].'/include/connect.php';
					$sql = "UPDATE config SET setting='$setting' WHERE name='$name'"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
}
function createconfig($name,$setting)
{
					include_once $_SERVER['DOCUMENT_ROOT'].'/include/connect.php';
					$sql = "delete from config where name='$name'";
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
					$sql = "insert into config SET setting='$setting',  name='$name'"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
}	
?>