<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
 
	$title=" - Update Gallery"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	$auth = $_COOKIE['auth_new'];
	$id=$_POST['id'];
	$date=date("Y-m-d H:i:s");
	$name=$_POST['name'];
	$caption=$_POST['caption'];
	$info=$_POST['info'];

	$image=$_POST['image'];
	#echo $sec;
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	include $_SERVER["DOCUMENT_ROOT"].'/gall/null_check.php';
	$query="UPDATE image_store SET caption='$caption',info='$info' WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{
		mysql_query($query);

		echo "<div class=\"middle\">Record Updated</div>";
		echo "<div class=\"middle\"><a href=\"javascript:history.back(1)\">Back</a></div><br>";
		mysql_close();
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>