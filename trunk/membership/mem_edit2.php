<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
 
	$title=" - Edit Membership Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php 
	$area="membership";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 

	$id=$_POST['id'];

	$text = $_POST['text'];

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE content SET text='$text' WHERE id='$id'";
	if( !(true) )
	{
	  
	}
	else
	{
		mysql_query($query);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("editmem",$auth,$text);
header("Location:index.php");exit();
		mysql_close();
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>