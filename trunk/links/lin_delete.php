<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Delete Links Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body>
<?php 
	$area="links";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';  
?>
<div class="left-content padding">
<a name="content"></a>
	<h2 class="middle bold">Delete Links</h2>
<?php

	$id=$_GET['id'];

	if( false )
	{
	  
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("dellinks",$auth,$id);
		include $_SERVER["DOCUMENT_ROOT"].'/db/dblinks.php';
		$ans = deletelinks($id);
		header("Location:index.php");
		echo "<p class=\"padding middle\">Link Deleted</p>";
		echo "<p class=\"padding middle\"><a href=\"index.php\">Back</a></div>";
	} 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>