<?php 
	$title=" - Our Purpose";
	$tinymce=true;
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="purpose";
	$page="purpose";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Edit Our Purpose Page</h2>
<?php

	$self = $_SERVER['PHP_SELF'];
	if(isset($_POST['text']))
	{
		$text = $_POST['text'];
	}
	else $text="";
	if(isset($_POST['image']))
	{
		$image = $_POST['image'];
	}
	else $image="";
	$link = "";
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit="";
	$unique_name = date("U").".jpg";

	#the html form
	$form = "<form action=\"$self\" method=\"post\" enctype=\"multipart/form-data\"><fieldset>";
	$form.= "<label for=\"text\">Text: </label><textarea id=\"text\" cols=\"35\" rows=\"10\" name=\"text\" >$text</textarea><br/>";


	$form.= "<label for=\"image\">Image Url: </label><input id=\"image\" type=\"file\" name=\"image\" size=\"35\" /><br/>";


	$form.= "<label>&nbsp;</label><input id=\"add\" type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";


	#on first opening display the form
	if( !$submit)
	{ 
		$msg = $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !$text ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<p class=\"middle red\">Please complete all fields</p>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
 
		#connect to MySQL
		include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';  

		if( $_FILES['image']['name'] != "" )
		{
			copy ( $_FILES['image']['tmp_name'], 
			'../imgs/photos/' . $unique_name ) 
			or die( "Could not copy file" );
			$image = '../imgs/photos/' . $unique_name;
			include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
			image_resize(740,740,'740',$image);
			image_resize(100,100,'100',$image);
			image_resize(140,140,'140',$image);
			image_resize(250,250,'250',$image);
			image_resize(580,580,'580',$image);
		}

		#create the SQL query
		if($text)
		{
			$sql = "insert into content (text,image, link, page) 
			values (\"$text\",\"$image\",\"$link\",\"purpose\")"; 
			$rs = mysql_query($sql) 
			or die ("Could not execute SQL query");
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newpurpose",$auth,$text);
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
header("Location:index.php");exit();
			#header("Location:index2.php" ); exit();
		}
	}
echo($msg);
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
