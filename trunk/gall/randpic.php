<?php
	$query = "SELECT count(username) as numrows FROM users WHERE gall_null=0";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];

	$sql = "select username from users WHERE gall_null=0 order by rand()*$numrows limit 1";
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$ans = $row['username'];
	}			
	#create the SQL query
	$query2   = "SELECT COUNT(*) AS numrows FROM image_store where author_id = '$ans'";
	$result2  = mysql_query($query2) or die('Error, query 2 failed');
	$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
	$numrows2 = $row2['numrows'];

	$sql2 = "select image_store.*, users.lastname, users.displayname from image_store join users 
	on image_store.author_id = users.username where author_id = '$ans' order by rand()*$numrows2 limit 1";

	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query 2" );

	while ( $row2 = mysql_fetch_array( $rs2 ) ) 
	{
		echo "<p class=\"middle bold entry-title\"><a href=\"../image/".$row2['author_id']."/".$row2['id']."/\">".ucwords(strtolower($row2['caption']))."</a></p>";
		echo "<p class=\"middle bold entry-content\"><a href=\"../image/".$row2['author_id']."/".$row2['id']."/\"><img alt=\"Photo of ".ucwords(strtolower($row2['caption']))."\" src=\"../".str_replace('photos','250',$row2['image'])."\" /></a></p>";
		echo "<p class=\"middle bold entry-title\">by <a href=\"/gall/1/".$row2['author_id']."/\">".$row2['displayname']." ".$row2['lastname']."</a></p>";
		echo "<span class=\"hide ttl\">&nbsp;</span>";
		echo "<a rel=\"bookmark\" href=\"../image/".$row2['author_id']."/".$row2['id']."/\" style=\"display:none;\"></a>";
	}
function rndimage()
{
$query = "SELECT count(username) as numrows FROM users WHERE gall_null=0";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];

	$sql = "select username from users WHERE gall_null=0 order by rand()*$numrows limit 1";
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$ans = $row['username'];
	}			
	#create the SQL query
	$query2   = "SELECT COUNT(*) AS numrows FROM image_store where author_id = '$ans'";
	$result2  = mysql_query($query2) or die('Error, query 2 failed');
	$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
	$numrows2 = $row2['numrows'];

	$sql2 = "select image_store.*, users.lastname, users.displayname from image_store join users 
	on image_store.author_id = users.username where author_id = '$ans' order by rand()*$numrows2 limit 1";

	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query 2" );

	while ( $row2 = mysql_fetch_array( $rs2 ) ) 
	{
	return $row2['image'];
	}

}	
?>