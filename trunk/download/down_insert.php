<?php 

	$title=" - Edit Downloads";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="download";
	$page="download";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
    <div class="left-content padding">
	<a name="content"></a>
	<h2 class="bold middle">New Download</h2>
<?php
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=null;
	$self = $_SERVER['PHP_SELF'];
	$other = $_SERVER['REMOTE_ADDR'];
	$unique_name = date("U");
	if(isset($_POST['ufile']))
	{
		$ufile = $_POST['ufile'];
	}
	if(isset($_POST['comment']))
	{
		$comment = $_POST['comment'];
	}
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit="";
	$msg="";
	#the html form
	$form = "<form action=\"$self\" method=\"post\" enctype=\"multipart/form-data\"><fieldset>";
	$form.= "<label for=\"comment\">Description of file: </label><textarea cols=\"35\" rows=\"5\" id=\"comment\" name=\"comment\" ></textarea><br/>";
	$form.= "<label for=\"upload\">File to be uploaded: </label><input id=\"upload\" type=\"file\" name=\"ufile\" size=\"35\"  /><br/>";
	$form.= "<label>&nbsp;</label><input id=\"add\" type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Upload\" /> </fieldset></form>";
	
	if($status=="toobig") 
	{
		$msg= "<p class=\"middle red\">File was too large to upload. Please only upload files less than 2MB.</p>";
	}

	#on first opening display the form
	if( !$submit)
	{ 
		$msg .= $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !$comment ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<p class=\"middle red\">Please complete all fields.</p>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
 
		#connect to MySQL

		if( $_FILES['ufile']['name'] != "" )
		{
			$ext = substr($_FILES['ufile']['name'],  -3);
			$filename = $unique_name.".".$ext;
			copy ( $_FILES['ufile']['tmp_name'], 
			$filename ) 
			or die( header("Location:down_insert.php?status=toobig"));
			$disp = $_FILES['ufile']['name'];
			$ufile = $filename;
		}

		$filesize = filesize ($ufile);



		#create the SQL query
		if($comment)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';
			$rs = setdownload($ufile,$comment,$filesize,$disp);

		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newdownload",$auth,$disp,$comment);
			header("Location:index.php");
		    $msg = "<p class=\"padding middle\">Thank you - your file has been uploaded.</p>";
		   
			$msg.= "<p class=\"middle\"><a href = \"index.php\">";

		    $msg.= "Back</a></p>";

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