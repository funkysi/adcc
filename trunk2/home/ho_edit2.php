<?php 
	$title=" - Edit Home Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php

	$id=$_POST['id'];
	$area="index";
	$page="home";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	
	$text=$_POST['text'];
	$title=$_POST['title'];
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

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
		
	}

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>