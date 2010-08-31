<?php 

	$title=" - Delete Committee";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="contact";
	$page="committee";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE users set role='' WHERE id='$id'";
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delcommittee",$auth,$id);
		mysql_query($query);
		
		

		header("Location:index.php");

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>