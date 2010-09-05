<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
    <div class="left-content padding">
	<a name="content"></a><h2 class="bold middle">Edit Map Page</h2>
<?php
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=null;
	if(isset($_SERVER['PHP_SELF']))
	{
		$self = $_SERVER['PHP_SELF'];
	}
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
	if(isset($_POST['submit']))
	{	
		$submit = $_POST['submit'];
	}
	else $submit="";
	$msg="";
	$page=$area;
	$link='';
	#the html form
	$form = "<form action=\"$self\" method=\"post\" enctype=\"multipart/form-data\"><fieldset>";
	$form.= "<label for=\"text\">Text: </label><textarea id=\"text\" cols=\"35\" rows=\"5\" name=\"text\" ></textarea>";
	$form.= "<label for=\"image\">Image: </label><input id=\"image\" type=\"file\" name=\"image\" size=\"35\" /><br/>";
	$form.= "<label>&nbsp;</label><input type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";

	if($status=="toobig") 
	{
		$msg.= "<p class=\"middle red\">File was too large to upload. Please only upload files less than 2MB.</p>";
	}
	#on first opening display the form
	if( !$submit)
	{ 
		$msg.= $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	#if( true or true)
	if(( $_FILES['image']['name'] == "" and $text==""))  //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg .= "<p class=\"middle red\">Please complete the fields.</p>";
		$msg.= $form;
	}
	// else if( $text=="") //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	// {
		// $msg .= "<p class=\"middle red\">Please complete all T fields.</p>";
		// $msg.= $form;
	// }
	else

	#add the form data to the guestbook database table
	{
	 
		#connect to MySQL
  

		if( $_FILES['image']['name'] != "" )
		{
			$unique_name = date("U")."0.jpg";
			copy ( $_FILES['image']['tmp_name'], 
			'../imgs/photos/' . $unique_name ) 
			or die( header("Location:loc_insert.php?status=toobig") );
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
			$image = '';
		}



		#create the SQL query
		if($submit)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';
			$rs = setcontent($text,$image,$link,$page);
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{			
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newloc",$auth,$text);
			header("Location:index.php");
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