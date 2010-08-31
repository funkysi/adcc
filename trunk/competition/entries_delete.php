<?php 


	$title=" - Delete Competition entries";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php

	$id=$_GET['id'];
	$cid=$_GET['cid'];
	$page="competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$query="DELETE FROM entries WHERE id='$id'";
	$query2="OPTIMIZE TABLE entries ";
	if( false )
	{
  
	}
	else
	{
		mysql_query($query);
		mysql_query($query2);
		$sub ="Competition details deleted by ". $auth;
		$msg =$sub."\n\n";

		//include $_SERVER["DOCUMENT_ROOT"].'/include/email.php';
		header("Location:comp_edit.php?id=$cid" ); exit();

	}

	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
