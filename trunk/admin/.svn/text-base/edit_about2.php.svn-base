<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';

	if(!isset($_POST['image']))  
	{
		$image = "";
	}
	else $image = $_POST['image'];

	$email = $_POST['email'];
	$date=date("Y-m-d H:i:s");
	$auth=$_POST['auth'];
	$unique_name = date("U").".jpg";
	$about=$_POST['about'];
	
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	if( $_FILES['image']['name'] != "" )
	{
		if((substr($_FILES['image']['name'],  -3)!="jpg" and substr($_FILES['image']['name'],  -3)!="JPG"))
		{
			header("Location:edit_about.php?&status=jpg");exit();
		}
		copy ( $_FILES['image']['tmp_name'], '../imgs/photos/'. $unique_name ) 
		or die( header("Location:edit_about.php?&status=toobig") );
		$image = '../imgs/photos/'.  $unique_name;
		include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
		image_resize(740,740,'740',$image);
		image_resize(100,100,'100',$image);
		image_resize(140,140,'140',$image);
		image_resize(250,250,'250',$image);
		image_resize(580,580,'580',$image);
	}
	else
	{
		$image='';
	}
 
	$title=" - Edit About Me";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	if ($image=='') $query="UPDATE users SET about='$about', email='$email' WHERE username='$auth'";
	else $query="UPDATE users SET about='$about', email='$email', image='$image' WHERE username='$auth'";
	if( !(true) )
	{
  
	}
	else
	{
		mysql_query($query);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("aboutme",$auth,$about,$email);
header("Location:../author/$auth/");
		
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>