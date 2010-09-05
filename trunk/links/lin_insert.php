<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Links Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="links";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Insert New Link</h2>
<?php
	if(isset($_SERVER['PHP_SELF']))
	{
		$self = $_SERVER['PHP_SELF'];
	}
	if(isset($_POST['description']))
	{
		$description=$_POST['description'];
	}
	if(isset($_POST['linktext']))
	{
		$linktext = $_POST['linktext'];
	}
	if(isset($_POST['link']))
	{
		$link = $_POST['link'];
	}
	if(isset($_POST['pri']))
	{
		$pri = $_POST['pri'];
	}
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit="";
	#the html form
	$form = "<form action=\"$self\" method=\"post\"><fieldset>";
	$form.= "<label for=\"pri\">Link Priority (0-High, 100-Low): </label><input id=\"pri\" type=\"text\" name=\"pri\" ";
	$form.= "size=\"40\" value=\"0\"/><br/> ";
	$form.= "<label for=\"text\">Link Text: </label><input id=\"text\" type=\"text\" name=\"linktext\" ";
	$form.= "size=\"40\" /><br/> ";
	$form.= "<label for=\"url\">Link Url: </label><input id=\"url\" type=\"text\" name=\"link\" ";
	$form.= "size=\"40\" /><br/> ";
	$form.= "<label for=\"desc\">Link Description: </label><textarea id=\"desc\" cols=\"35\" rows=\"5\" name=\"description\" >";
	$form.= "</textarea><br/> ";
	$form.= "<label>&nbsp;</label><input id=\"update\" type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";


	#on first opening display the form
	if( !$submit)
	{ 
		$msg = $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !$link or !$linktext ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<p class=\"middle red\">Please complete all fields</p>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
		#connect to MySQL


		#create the SQL query
		if($link)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/db/dblinks.php';
			$rs = setlinks($linktext,$link,$pri,$description);
	// $sub ="Link added by ". $auth;
// $msg =$sub."\n\nLink: ".$link;

// include $_SERVER["DOCUMENT_ROOT"].'/include/email.php';
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newlinks",$auth,$link,$linktext,$description);
			header("Location:index.php");
			$msg = "<p class=\"padding middle\">Thank you - your entry has been saved.</p>";
   
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