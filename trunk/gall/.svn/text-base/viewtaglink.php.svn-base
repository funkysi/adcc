<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
$tagtag=null;
$sql="select tags.tag from tags join imageJtag on tags.id = imageJtag.tag where image='$id' order by tag";
$rs = @mysql_query( $sql ) 
			or die( "Could not execute SQL query" );
while ( $row = mysql_fetch_array( $rs ) ) 
{
	$tagtag .="<a href=\"removetag.php?id=$id&tag=".$row['tag']."&type=".$type."\">".$row['tag']."</a>, ";
}

echo $tagtag;

?>
