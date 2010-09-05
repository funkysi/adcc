<?php
function getconfig($name)
{
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql="select * from config where name='$name'";
	$rs = @mysql_query($sql) or die("Could not execute SQL query");
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
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "UPDATE config SET setting='$setting' WHERE name='$name'"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
}	
?>