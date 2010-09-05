<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Delete Downloads";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="download";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';  
?>	
    <div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Delete Download</h2>
<?php
		$id=$_GET['id'];
		$ufile=$_REQUEST['ufile'];
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("deldownload",$auth,$id);
		include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';
		$ans = deletedownload($id);
		unlink($ufile);
		header("Location:index.php");

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>