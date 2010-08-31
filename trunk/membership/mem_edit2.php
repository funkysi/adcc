<?php 
 
	$title=" - Edit Membership Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php 
	$area="membership";
	$page="membership";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 

	$id=$_POST['id'];

	$text = $_POST['text'];

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE content SET text='$text' WHERE id='$id'";
	if( !(true) )
	{
	  
	}
	else
	{
		mysql_query($query);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("editmem",$auth,$text);
header("Location:index.php");exit();
		
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>