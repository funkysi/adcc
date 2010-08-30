<?php 
	$title=" - Edit Committee";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';  
?>
<body >
<?php
	$area="contact";
	$page="committee";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	$id=$_POST['id'];
	$displayname = $_POST['displayname'];
	$lastname = $_POST['lastname'];
	$role = $_POST['role'];
	$image = $_POST['image'];
	$about = $_POST['about'];
	$email = $_POST['email'];
	$order = $_POST['order'];

	if( $_FILES['image']['name'] != "" )
	{
		$unique_name = date("U")."0.jpg";
		copy ( $_FILES['image']['tmp_name'], '../imgs/photos/' . $unique_name ) or die( "Could not copy file" );
		$image = '../imgs/photos/' . $unique_name;
		include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
		image_resize(740,740,'740',$image);
		image_resize(100,100,'100',$image);
		image_resize(140,140,'140',$image);
		image_resize(250,250,'250',$image);
		image_resize(580,580,'580',$image);
	}
	else
	{

	}

	if( false )
	{
  
	}
	else
	{
		updateuser($image,$role,$displayname,$lastname,$about,$email,$order,$id);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("comedit",$auth,$id,$about,$email);
		header("Location:index.php");
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
