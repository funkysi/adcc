<?php
include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
$tagtag=null;
$sql="select tags.tag from tags join imageJtag on tags.id = imageJtag.tag where image='$id'";
$rs = @mysql_query( $sql ) 
			or die( "Could not execute SQL query" );
while ( $row = mysql_fetch_array( $rs ) ) 
{
	$tagtag .=$row['tag'].", ";
}
mysql_close();
echo $tagtag;

?>
