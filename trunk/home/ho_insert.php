<?php 
	$title=" - Edit Home Page";	
	$tinymce=true;
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="index";
	$page="home";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Add Home Page Details</h2>
<?php
	$self = $_SERVER['PHP_SELF'];
	$other = $_SERVER['REMOTE_ADDR'];
	if(isset($_POST['text']))
	{
		$text = $_POST['text'];
	}
	else $text="";
	if(isset($_POST['title']))
	{
		$title = $_POST['title'];
	}
	else $title="";
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit="";
	#the html form
	$form = "<form action=\"$self\" method=\"post\" ><fieldset>";
	$form.= "<label for=\"image\">Title: </label><textarea id=\"image\" cols=\"35\" rows=\"5\" name=\"title\" >$title</textarea>";
	$form.= "<br/> ";

	$form.= "<label for=\"text\">Main Text: </label><textarea id=\"text\" cols=\"35\" rows=\"5\" name=\"text\" >$text</textarea><br/>";

	$form.= "<label>&nbsp;</label><input id=\"add\" type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";

	#on first opening display the form
	if( !$submit)
	{ 
		$msg = $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !($text or $title)) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<p class=\"middle red\">Please complete all fields</p>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
		#connect to MySQL
		include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php'; 
		#create the SQL query
		if($text or $title)
		{
			$sql = "insert into content (text,title,page) 
			values (\"$text\",\"$title\",\"home\")"; 
			$rs = mysql_query($sql) 
			or die ("Could not execute SQL query");
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newhome",$auth,$text,$title);
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
			header("Location:index.php");exit();
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
