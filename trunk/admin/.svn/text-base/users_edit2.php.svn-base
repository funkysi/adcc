<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Users";
 
	$type=$_POST['type'];
	$id=$_POST['id'];
	$displayname = $_POST['displayname'];
	$lastname = $_POST['lastname'];
	$role = $_POST['role'];
	$image = $_POST['image'];
	$about = $_POST['about'];
	
	$email = $_POST['email'];


	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	if( $_FILES['image']['name'] != "" )
	{
		if((substr($_FILES['image']['name'],  -3)!="jpg" and substr($_FILES['image']['name'],  -3)!="JPG"))
		{
			header("Location:users_edit.php?type=$type&status=jpg");exit();
		}
		$unique_name = date("U")."0.jpg";
		copy ( $_FILES['image']['tmp_name'], '../imgs/photos/' . $unique_name ) 
		or die( header("Location:users_edit.php?type=$type&status=toobig") );
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

	$query="UPDATE users SET image='$image', role='$role',displayname='$displayname',lastname='$lastname', about='$about', email='$email' WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{

	mysql_query($query);
	include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
	sendemail("comedit",$auth,$id,$about,$email);
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	header("Location:users_edit.php");
	

	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>