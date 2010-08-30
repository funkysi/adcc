<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
?>
<?php
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=null;

	if(isset($_POST['name']))
	{
		$name = $_POST['name'];
	}
	
	if(isset($_POST['image']))
	{
		$image = $_POST['image'];
	}
	
	if(isset($_POST['info']))
	{
		$info = $_POST['info'];
	}

	if(isset($_POST['caption']))
	{
		$caption = $_POST['caption'];
	}
	
	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
	}
	
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit="";
	$self = $_SERVER['PHP_SELF'];
date_default_timezone_set('UTC');
	$unique_name = date("U").".jpg";
	$date = date("Y-m-d H:i:s");
	$type = $_REQUEST['type'];
	$msg="";
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
		
	$sql = "select * from users where username='$type'";

	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$level = $row['level'];
		if($level!=1) header("Location:all_gall_edit.php");
		$namew = $row['displayname']." ".$row['lastname'];
		$title2 = "<h2 class=\"middle bold\">Add Image to ".$namew. "'s Gallery</h2>";
	}
	#the html form
	$form= "<form action=\"$self?type=$type\" method=\"post\" enctype=\"multipart/form-data\"><fieldset>";
	$form.= "<label for=\"name\">Authors Name: </label><input id=\"name\" readonly=\"readonly\" class=\"pos2\" type=\"text\" name=\"name\" value=\"$namew\" size=\"46\" /><br/>";
	$form.= "<label for=\"image\" >Image: </label><input id=\"image\" class=\"pos2\" type=\"file\" name=\"image\" size=\"35\" /><br/>";
	$form.= "<label for=\"caption\">Caption: </label><input id=\"caption\" class=\"pos2\" type=\"text\" name=\"caption\" size=\"46\" /><br/>";
	$form.= "<label for=\"info\">More Details about the photo: </label><textarea id=\"info\" cols=\"35\" rows=\"10\" name=\"info\" ></textarea><br/>";
	$form.= "<label>&nbsp;</label><input id=\"add\" class=\"pos2\" type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\"/></fieldset></form>";

	if($status=="toobig") 
	{
		$msg= "<p class=\"red middle\">Image was too large to upload. Please only upload files less than 2MB.</p>";
	}
	#on first opening display the form
	if( !$submit)
	{ 
		#$msg = "Please only upload images in jpg format.<br/><br/>";
		include $_SERVER["DOCUMENT_ROOT"].'/gall/null_check.php';
		$msg.= $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( substr($_FILES['image']['name'],  -3)!="jpg" and substr($_FILES['image']['name'],  -3)!="JPG") //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<span class=\"red middle\">Please only upload images in jpg format.</span>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
		if( $_FILES['image']['name'] != "" )
		{
			copy ( $_FILES['image']['tmp_name'], '../imgs/photos/' . $unique_name ) 
			or die( header("Location:all_upload.php?type=$type&status=toobig") );
		}
		else
		{
			die( "No Image file specified" );
		}

		$image = '../imgs/photos/' . $unique_name;
		include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
		image_resize(740,740,'740',$image);
		image_resize(100,100,'100',$image);
		image_resize(140,140,'140',$image);
		image_resize(250,250,'250',$image);
		image_resize(580,580,'580',$image);

		#create the SQL query
		if($name)
		{
			$sql = "insert into image_store (name,image,info,caption,author_id) 
			values (\"$name\",\"$image\",\"$info\",\"$caption\",\"$type\")"; 

			$rs = mysql_query($sql) or die ("Could not execute SQL query");
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("upload",$name,$image,$info,$caption,$type,$auth);
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
			$msg = "<div class=\"middle\">Thank you - your image has been added.</div>";
   
			$msg.= "<div class=\"middle\"><a href = \"all_gall_edit.php\">";

			$msg.= "Back</a></div>";
		}
	}
 
	$title=" - Upload";
	$tinymce="true";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
<?php
	echo $title2;
	echo $msg;
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
