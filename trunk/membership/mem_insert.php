<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
?>
<?php 
	$title=" - Edit Membership Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="membership";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Edit Membership Page</h2>
<?php
	$self = $_SERVER['PHP_SELF'];
	$other = $_SERVER['REMOTE_ADDR'];
	if(isset($_POST['text']))
	{
		$text = $_POST['text'];
	}
	else $text="";
	$image = "";
	$link = "";
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit="";

	#the html form
	$form = "<form action=\"$self\" method=\"post\" enctype=\"multipart/form-data\"><fieldset>";
	$form.= "<label for=\"text\">Text:</label> <textarea id=\"text\" cols=\"35\" rows=\"10\" name=\"text\" >$text</textarea><br/>";

	$form.= "<label>&nbsp;</label><input type=\"submit\" name=\"submit\" ";
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
		include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php'; 

		#create the SQL query
		if($text)
		{
			$sql = "insert into content (text,page) 
			values (\"$text\",\"membership\")"; 
			$rs = mysql_query($sql) 
			or die ("Could not execute SQL query");
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newmem",$auth,$text);
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