<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Links Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';  
?>
<body>
<?php 
	$area="links";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';  
?>
<div class="left-content padding">
<a name="content"></a>
	<h2 class="middle bold">Edit Link</h2>
<?php

	$id=$_POST['id'];
	$linktext=$_POST['linktext'];
	$link=$_POST['link'];
	$pri=$_POST['pri'];
	$description=$_POST['description'];

	if( $linktext=="" or $link=="" )
	{
		header("Location:lin_edit.php?id=$id");
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/db/dblinks.php';
		$ans = updatelinks($linktext,$link,$pri,$description,$id);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("editlinks",$auth,$linktext,$link,$description);
		header("Location:index.php");
		echo "<p class=\"padding middle\">Link Updated</p>";
		echo "<p class=\"padding middle\"><a href=\"index.php\">Back</a></div>";
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>

</div>
</body>
</html>