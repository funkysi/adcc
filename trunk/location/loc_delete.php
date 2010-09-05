<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Delete Location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body >
<?php
	$area="location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	$id=$_GET['id'];
?>
	<a name="content"></a>
	<h2 class="middle bold">Delete Item</h2>
<?php

		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delloc",$auth,$id);
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';
	$ans = deletecontent($id);
	header("Location:index.php");


	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>