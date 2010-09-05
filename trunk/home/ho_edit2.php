<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';

	$title=" - Edit Home Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php

	$id=$_POST['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	$area="index";
	$text=$_POST['text'];
	$title=$_POST['title'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE content SET text='$text', title='$title' WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{
		mysql_query($query);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("edithome",$auth,$text,$title);
header("Location:index.php");exit();
		mysql_close();
	}

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>