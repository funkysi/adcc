<?php 

 
	$title=" - Competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="competition";
	$page="competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Add Competition Entry</h2>
<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	else $id=null;
	$self = $_SERVER['PHP_SELF'];
	$other = $_SERVER['REMOTE_ADDR'];
	if(isset($_POST['image_title']))
	{
		$image_title = $_POST['image_title'];
	}
	if(isset($_POST['users']))
	{
		$users = $_POST['users'];
	}
	if(isset($_POST['score']))
	{	
		$score = $_POST['score'];
	}
	if(isset($_POST['pword']))
	{
		$pword = $_POST['pword'];
	}
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit=null;
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$sql = "select * from users where level = 1 order by lastname ";

	#execute the query
	$rs = @mysql_query( $sql ) 
	or die( "Could not execute SQL query" );
	$arr = array();
	$brr = array();
	$query = array();
	$j = 0;
	#loop through all records
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$arr[$j] = $row['username'];
		$brr[$j] = $row['displayname']." ".$row['lastname'];
		$j++;
	}
	$max = count($arr);
	#the html form
	$form = "<form action=\"$self\" method=\"post\" ><fieldset>";
	$form.= "<label for=\"image_title\">Image Title: </label><input id=\"image_title\" type=\"text\" name=\"image_title\" size=\"35\" />";
	$form.= "<br/> ";

	$form.= "<label for=\"users\">Author: </label><select name=\"users\">";
	for ($j = 0; $j < $max; $j++)
	{
		$form.= "<option value=\"".$arr[$j]."\" >".$brr[$j]."</option>";
	}
	$form.="</select>";
	$form.= "<br/> ";
	$form.= "<label for=\"score\">Score: </label><input id=\"score\" type=\"text\" name=\"score\" size=\"35\" />";
	$form.= "<br/><input type=\"hidden\" name=\"id\" value=\"$id\" /> ";

	$form.= "<label>&nbsp;</label><input id=\"add\" type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";


	#on first opening display the form
	if( !$submit)
	{ 
		$msg = $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !$image_title ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<b>Please complete all fields</b><br/><br/>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
 
		#connect to MySQL
		include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';   

		$id=$_POST['id'];

		#create the SQL query
		if($image_title)
		{
			$sql = "insert into entries (image_title,users, score,compid) 
				values (\"$image_title\",\"$users\",\"$score\",\"$id\")"; 
			$rs = mysql_query($sql) 
			or die ("Could not execute SQL query");
			$sub ="New image on Competition page added by ". $auth;
			$msg =$sub."\n\nText: ".$image_title;

			//include $_SERVER["DOCUMENT_ROOT"].'/include/email.php';
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{

			header("Location:comp_edit.php?id=$id" ); exit();
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