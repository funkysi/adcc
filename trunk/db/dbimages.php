<?php
function getimagebyusername($username,$offset,$rowsPerPage)
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql="select * from image_store where author_id='$username' order by date desc limit $offset, $rowsPerPage";
	$rs = @mysql_query($sql) or die("Could not execute SQL query");
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans[$i]['id']=$row['id'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['name']=$row['name'];
						$ans[$i]['caption']=$row['caption'];
						$ans[$i]['info']=$row['info'];
						$ans[$i]['date']=$row['date'];
						$i++;
					}
	return $ans;
}
function getcountimagebyusername($username,$offset,$rowsPerPage)
{	
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from image_store where author_id='$username' order by id";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function getimage($id)
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select image_store.*, users.lastname, users.displayname from image_store join users on image_store.author_id = users.username where image_store.id = $id";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans[$i]['id']=$row['id'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['caption']=$row['caption'];
						$ans[$i]['info']=$row['info'];
						$ans[$i]['date']=$row['date'];
						$ans[$i]['displayname']=$row['displayname'];
						$ans[$i]['lastname']=$row['lastname'];
						$ans[$i]['count']=$row['count'];
						$i++;
					}
	return $ans;
}
function viewimage($id,$count)
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "update image_store set count = $count where id = $id";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
}
function getimagebytag($type)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql ="SELECT *, image_store.image as realimage, image_store.id as realid 
					FROM image_store
					JOIN imageJtag ON image_store.id = imageJtag.image
					JOIN tags ON tags.id = imageJtag.tag where tags.tag = '$type'";
					$rs = @mysql_query($sql) or die("Could not execute SQL query");
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans[$i]['id']=$row['id'];
						$ans[$i]['author_id']=$row['author_id'];
						$ans[$i]['name']=$row['name'];
						$ans[$i]['caption']=$row['caption'];
						$ans[$i]['info']=$row['info'];
						$ans[$i]['date']=$row['date'];
						$ans[$i]['realid']=$row['realid'];
						$ans[$i]['realimage']=$row['realimage'];
						$i++;
					}
	return $ans;
}
function getcountimagebytag($type)
{	
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count FROM image_store
					JOIN imageJtag ON image_store.id = imageJtag.image
					JOIN tags ON tags.id = imageJtag.tag where tags.tag = '$type'";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function gettop10image()
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql="select * from image_store order by count desc limit 10";
					$rs = @mysql_query($sql) or die("Could not execute SQL query");
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans[$i]['id']=$row['id'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['caption']=$row['caption'];
						$ans[$i]['info']=$row['info'];
						$ans[$i]['name']=$row['name'];
						$ans[$i]['author_id']=$row['author_id'];
						$ans[$i]['count']=$row['count'];
						$i++;
					}
					return $ans;
}
function getbottom10image()
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql="select * from image_store order by count asc limit 10";
					$rs = @mysql_query($sql) or die("Could not execute SQL query");
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans[$i]['id']=$row['id'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['caption']=$row['caption'];
						$ans[$i]['info']=$row['info'];
						$ans[$i]['name']=$row['name'];
						$ans[$i]['author_id']=$row['author_id'];
						$ans[$i]['count']=$row['count'];
						$i++;
					}
					return $ans;
}
function gettop10recentimage()
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql="select * from image_store order by date desc limit 10";
					$rs = @mysql_query($sql) or die("Could not execute SQL query");
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans[$i]['id']=$row['id'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['caption']=$row['caption'];
						$ans[$i]['info']=$row['info'];
						$ans[$i]['name']=$row['name'];
						$ans[$i]['author_id']=$row['author_id'];
						$ans[$i]['count']=$row['count'];
						$i++;
					}
					return $ans;
}
?>