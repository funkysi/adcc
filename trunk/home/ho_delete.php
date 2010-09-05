<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';

	$title=" - Delete Home Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	$area="index";
	$id=$_GET['id'];

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="DELETE FROM content WHERE id='$id'";
	if( !(true) )
	{
	  
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delhome",$auth,$id);
		mysql_query($query);

header("Location:index.php");exit();
		mysql_close();
	}
?>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>