<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';

	$title=" - Delete Purpose Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="purpose";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	$id=$_GET['id'];
	#$image=$_REQUEST['image'];

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query1=" SELECT * FROM content WHERE id='$id'";
	$result=mysql_query($query1);
	#$image=mysql_result($result,$i,"image");

	$query="DELETE FROM content WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delpurpose",$auth,$id);
		mysql_query($query);

		#unlink($image);
header("Location:index.php");exit();
		mysql_close();
	}

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>