<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Upload";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Create Gallery</h2>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/gall/null_check.php';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';	
	$ans = getuserbyusername($auth);

	$namew=$ans[0]['displayname']." ".$ans[0]['lastname'];

if(isset($_SERVER['PHP_SELF']))
{
	$self = $_SERVER['PHP_SELF'];
}
$date=date("Y-m-d H:i:s");
if(isset($_POST['name']))
{
	$name = $_POST['name'];
}
$unique_name = date("U").".jpg";
if(isset($_POST['image']))
{
	$image = $_POST['image'];
}
if(isset($_POST['info']))
{
	$info = $_POST['info'];
}

$caption = $_POST['caption'];
$id = $_POST['id'];

$submit = $_POST['submit'];

#the html form
$form = "<form action=\"$self\" method=\"post\" enctype=\"multipart/form-data\">";
$form.= "<fieldset><label for=\"name\">Authors Name: </label><input readonly=\"readonly\" id=\"name\" type=\"text\" name=\"name\" value=\"$namew\" size=\"40\" /><br/>";
$form.= " ";

$form.= "<label for=\"file\">Select Image File: </label><input id=\"file\" type=\"file\" name=\"image\" size=\"35\" /><br/>";
$form.= " ";
$form.= "<label for=\"title\">Image Title: </label><input id=\"title\" type=\"text\" name=\"caption\" size=\"40\" /><br/>";
$form.= " ";
$form.= "<label for=\"details\">More Details about the photo: </label><textarea id=\"details\" cols=\"35\" rows=\"10\" name=\"info\" ></textarea><br/>";
$form.= "<input type=\"hidden\" name=\"auth\" value=\"$auth\" /><label for=\"submit\">&nbsp;</label><input id=\"submit\" type=\"submit\" name=\"submit\" ";
$form.= "value=\"Submit Photos\" /></fieldset> </form>";
$form.= "";

#on first opening display the form
if( !$submit)
{ $msg= "
Please only upload images in jpg format. All files uploaded will be reviewed and inappropriate content will be deleted.<br/><br/>";
$msg.= $form;}
else 

#redisplay a message and the form if incomplete
if( substr($_FILES['image']['name'],  -3)!="jpg" and substr($_FILES['image']['name'],  -3)!="JPG") //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
{
  $msg = "<span class=\"redtext\">Please only upload images in jpg format.</span><br/><br/>";
  $msg.= $form;
}
else

#add the form data to the guestbook database table
{
  
#connect to MySQL
 include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

if( $_FILES['image']['name'] != "" )
	{

	  copy ( $_FILES['image']['tmp_name'], 
	  '../imgs/photos/' . $unique_name ) 
	  or die( "Could not copy file" );

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



$sub ="Photo ".$caption." Uploaded by ". $auth;
$msg =$sub."\nAuthor: ".$auth."\nImage title: ".$caption."\nImage details: ".$info."\nDate: ".$date."\n\n";
if($caption) {
include_once '../include/email.php';
}
  #create the SQL query
  if($name)
  {

     $sql = "insert into image_store (name,info,image,caption, author_id) 
			values (\"$name\",\"$info\",\"$image\",\"$caption\",\"$auth\")"; 
     $rs = mysql_query($sql) 
	or die ("Could not execute SQL query");

  }

  #confirm the entry and display a link to view guestbook
  if($rs)
  {
    $msg = "<div class=\"middle\">Thank you - your image has been added.</div>";
   
$msg.= "<div class=\"middle\"><a href = \"javascript:history.back(1)\">";

    $msg.= "Back</a></div>";
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