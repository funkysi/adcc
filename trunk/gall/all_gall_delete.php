<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';

	$title=" - Delete Gallery"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';

	$auth = $_COOKIE['auth_new'];
	$id=$_REQUEST['id'];
	$type=$_REQUEST['type'];
	$thumb=$_REQUEST['thumb'];
	$image=$_REQUEST['image'];
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	include $_SERVER["DOCUMENT_ROOT"].'/gall/null_check.php';
	$del_query="DELETE FROM image_store WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delphoto",$auth,$id);
		mysql_query($del_query);
		unlink($thumb);
		unlink($image);
		

		echo "<div class=\"middle\">Record Updated</div>";
		echo "<div class=\"middle\"><a href=\"javascript:history.back(1)\">Back</a></div><br>";

	}

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>