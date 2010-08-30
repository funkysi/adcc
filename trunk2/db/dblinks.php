<?php
function getlinks($id="")
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select * from links $id order by pri asc ";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
	$ans=array();
	$i=0;
	while ($row=mysql_fetch_array($rs))
	{  
				$ans[$i]['id']=$row['id'];
				$ans[$i]['link']=$row['link'];
				$ans[$i]['linktext']=$row['linktext'];
				$ans[$i]['description']=$row['description'];
				$ans[$i]['pri']=$row['pri'];
				$i++;

	}
	return $ans;
}
function getcount()
{	
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from links order by pri asc";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function setlinks($linktext,$link,$pri,$description)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "insert into links (linktext,link, pri, description) 
						values (\"$linktext\",\"$link\",\"$pri\",\"$description\")"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
					return $rs;
}
function updatelinks($linktext,$link,$pri,$description,$id)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "UPDATE links SET linktext='$linktext', link='$link', pri='$pri',description='$description' WHERE id='$id'"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
}
function deletelinks($id)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "DELETE FROM links WHERE id='$id'";
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
}
?>