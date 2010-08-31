<?php 


	$title=" - Delete Membership Page";
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
	$id=$_GET['id'];

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="DELETE FROM content WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delmem",$auth,$id);
		mysql_query($query);
header("Location:index.php");exit();
		
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>