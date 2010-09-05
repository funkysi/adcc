<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Committee";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';  
?>
<body >
<?php
	$area="contact";
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
