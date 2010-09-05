<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';

	$title=" - Delete Membership Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="membership";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	$id=$_GET['id'];

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="DELETE FROM content WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delmem",$auth,$id);
		mysql_query($query);
header("Location:index.php");exit();
		mysql_close();
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>