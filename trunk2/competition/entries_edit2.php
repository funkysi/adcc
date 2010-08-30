<?php 

 
	$title=" - Update Competition Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$cid=$_POST['cid'];
	$id=$_POST['id'];
	$area="competition";
	$page="competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	$image_title = $_POST['image_title'];
	$users = $_POST['users'];
	$score = $_POST['score'];

	//$pword = $_POST['pword'];

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE entries SET image_title='$image_title',  users='$users', score='$score' WHERE id='$id'";
	if( false )
	{
	  
	}
	else
	{
		mysql_query($query);
		$sub ="Competition Page details Updated by ". $auth;
		$msg =$sub."\n\nText: ".$image_title;

		//include $_SERVER["DOCUMENT_ROOT"].'/include/email.php';
		header("Location:comp_edit.php?id=$cid" ); exit();

	}
?>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>