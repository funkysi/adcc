<?php
	$query = "SELECT count(distinct author_id) as numrows FROM image_store";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
	srand(microtime()*1000000);
	$randuser=rand(0,$numrows-1);
	if($numrows>0)
	{
	$sql = "select distinct author_id from image_store limit $randuser, 1";
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$ans = $row['author_id'];
	}			
	#create the SQL query
	$query2   = "SELECT COUNT(*) AS numrows FROM image_store where author_id = '$ans'";
	$result2  = mysql_query($query2) or die('Error, query 2 failed');
	$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
	$numrows2 = $row2['numrows'];
	srand(microtime()*1000000);
	$randimage=rand(0,$numrows2-1);
	$sql2 = "select image_store.*,users.lastname, users.displayname from image_store join users 
	on image_store.author_id = users.username where author_id = '$ans' limit $randimage, 1";

	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query 2" );

	while ( $row2 = mysql_fetch_array( $rs2 ) ) 
	{
		echo "<p class=\"middle bold entry-title\"><a href=\"../image/".$row2['author_id']."/".$row2['id']."/\">".ucwords(strtolower($row2['caption']))."</a></p>";
		echo "<p class=\"middle bold entry-content\"><a href=\"../image/".$row2['author_id']."/".$row2['id']."/\"><img alt=\"Photo of ".ucwords(strtolower($row2['caption']))."\" src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."".str_replace('../imgs/photos','/imgs/250',$row2['image'])."\" /></a></p>";
		echo "<p class=\"middle bold entry-title\">by <a href=\"/gall/1/".$row2['author_id']."/\">".$row2['displayname']." ".$row2['lastname']."</a></p>";
		echo "<span class=\"hide ttl\">&nbsp;</span>";
		echo "<a rel=\"bookmark\" href=\"../image/".$row2['author_id']."/".$row2['id']."/\" style=\"display:none;\"></a>";
	}
	}
function rndimage()
{
	$query = "SELECT count(distinct author_id) as numrows FROM image_store";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];

	srand(microtime()*1000000);
	$randuser=rand(0,$numrows-1);

	$sql = "select distinct author_id from image_store limit $randuser, 1";
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$ans = $row['author_id'];
	}			
	#create the SQL query
	$query2   = "SELECT COUNT(*) AS num_rows FROM image_store where author_id = '$ans'";
	$result2  = mysql_query($query2) or die('Error, query 2 failed');
	$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
	$numrows2 = $row2['num_rows'];
	srand(microtime()*1000000);
	$randimage=rand(0,$numrows2-1);

	$sql2 = "select image_store.image from image_store join users 
	on image_store.author_id = users.username where author_id = '$ans' limit $randimage, 1";

	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query 2" );

	while ( $row2 = mysql_fetch_array( $rs2 ) ) 
	{
		return $row2['image'];
	}

}

	
?>