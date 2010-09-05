<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';

	$title=" - Delete Committee";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="contact";
	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE users set role='0' WHERE id='$id'";
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delcommittee",$auth,$id);
		mysql_query($query);
		
		mysql_close();

		header("Location:index.php");

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>