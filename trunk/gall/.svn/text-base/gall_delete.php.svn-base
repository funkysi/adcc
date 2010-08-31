<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
 
	$title=" - Delete Gallery"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	$auth = $_COOKIE['auth_new'];
	$id=$_GET['id'];
	$image=$_REQUEST['image'];

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	include $_SERVER["DOCUMENT_ROOT"].'/gall/null_check.php';
	$query="select * from image_store where id='$id'";
	$result=mysql_query($query);
	$caption=mysql_result($result,0,"caption");
	$desc=mysql_result($result,0,"info");
	$date=date("Y-m-d H:i:s");
	$query2="select * from image_store where id='$id'";
	$query="DELETE FROM image_store WHERE id='$id'";
	if( !(true) )
	{
	  
	}
	else
	{
		$w = @mysql_query($query2) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $w ) ) 
		{
			$caption=$row2['caption'];
		}
		mysql_query($query);
		unlink($image);

		echo "<div class=\"middle\">Record Updated</div>";
		echo "<div class=\"middle\"><a href=\"javascript:history.back(1)\">Back</a></div><br>";
		
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>