<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Downloads";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="download";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit Download</h2>
<?php	
	$id=$_POST['id'];
	$comment = $_POST['comment'];
	#$ufile = $_POST['ufile'];
	$disp = $_POST['disp'];

	include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';
	$ans = updatedownload($disp,null,$comment,$id);
	include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
	sendemail("editdownloads",$auth,$disp,$comment);
	header("Location:index.php");
	
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>