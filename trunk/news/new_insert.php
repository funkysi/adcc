<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$title=" - Insert News Page";
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	else $id=null;
	$self = $_SERVER['PHP_SELF'];
	if(isset($_POST['text']))
	{
		$text = $_POST['text'];
	}
	if(isset($_POST['title']))
	{
		$title = $_POST['title'];
	}
	if(isset($_POST['image']))
	{
		$image = $_POST['image'];
	}
	else $image = null;
	if(isset($_POST['link']))
	{
		$link = $_POST['link'];
	}
	if(isset($_POST['date']))
	{
		$date = $_POST['date'];
	}
	if(isset($_POST['year']))
	{
		$year=$_POST['year'];
	}
	if(isset($_POST['month']))
	{
		$month=$_POST['month'];
	}
	if(isset($_POST['day']))
	{
		$day=$_POST['day'];
	}
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit=null;
	$nowy=date("Y");
	$now=date("m");
	$nowm=date("F");
	$nowd=date("d");
	#the html form
	$form = "<form action=\"$self\" method=\"post\" enctype=\"multipart/form-data\"><fieldset>";
	$form.= "<label for=\"text\">Main Text: </label><textarea id=\"text\" cols=\"50\" rows=\"10\" name=\"text\" ></textarea>";
	$form.= "<br/> ";
	$form.= "<label for=\"image\">Image Url: </label><input id=\"image\" type=\"file\" name=\"image\" ";
	$form.= "size=\"35\" /><br/> ";
	$form.= "<label for=\"caption\">Image Caption: </label><input id=\"caption\" type=\"text\" name=\"title\" ";
	$form.= "size=\"40\" /><br/> ";
	$form.= "<label for=\"link\">Link Url: </label><input id=\"link\" type=\"text\" name=\"link\" ";
	$form.= "size=\"40\" /><br/> ";

	$form.= "<label for=\"day\">Date:</label> ";
	$form.= "";
	$form.="<select id=\"day\" name=\"day\">
	<option value=\"$nowd\" selected=\"selected\">$nowd</option>
	<option value=\"01\" >01</option>
	<option value=\"02\" >02</option>
	<option value=\"03\" >03</option>
	<option value=\"04\" >04</option>
	<option value=\"05\" >05</option>
	<option value=\"06\" >06</option>
	<option value=\"07\" >07</option>
	<option value=\"08\" >08</option>
	<option value=\"09\" >09</option>
	<option value=\"10\" >10</option>
	<option value=\"11\" >11</option>
	<option value=\"12\" >12</option>
	<option value=\"13\" >13</option>
	<option value=\"14\" >14</option>
	<option value=\"15\" >15</option>
	<option value=\"16\" >16</option>
	<option value=\"17\" >17</option>
	<option value=\"18\" >18</option>
	<option value=\"19\" >19</option>
	<option value=\"20\" >20</option>
	<option value=\"21\" >21</option>
	<option value=\"22\" >22</option>
	<option value=\"23\" >23</option>
	<option value=\"24\" >24</option>
	<option value=\"25\" >25</option>
	<option value=\"26\" >26</option>
	<option value=\"27\" >27</option>
	<option value=\"28\" >28</option>
	<option value=\"29\" >29</option>
	<option value=\"30\" >30</option>
	<option value=\"31\" >31</option>
	</select><select name=\"month\">
	<option value=\"$now\" >$nowm</option>
	<option value=\"01\" >January</option>
	<option value=\"02\" >February</option>
	<option value=\"03\" >March</option>
	<option value=\"04\" >April</option>
	<option value=\"05\" >May</option>
	<option value=\"06\" >June</option>
	<option value=\"07\" >July</option>
	<option value=\"08\" >August</option>
	<option value=\"09\" >September</option>
	<option value=\"10\" >October</option>
	<option value=\"11\" >November</option>
	<option value=\"12\" >December</option>
	</select><input size =\"5\" type=\"text\" name=\"year\" value=\"$nowy\" />";
	$form.= "<br/>";

	$form.= "<label>&nbsp;</label><input type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add News\" /> </fieldset></form>";
	$form.= "";

	#on first opening display the form
	if( !$submit )
	{ 
		$msgbox = $form;
		if($id=="toobig") 
		{
			$msgbox = "<p class=\"middle red\">Image was too large to upload. Please only upload files less than 2MB.</p>";
			$msgbox .= $form;
		}
		if($id=="jpg")
		{
			$msgbox = "<p class=\"middle red\">Please only upload images in jpg format.</p>";
			$msgbox.= $form;
		}
	}
	 
	#redisplay a message and the form if incomplete
	else if( !$text ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msgbox = "<p class=\"middle red\">Please complete all fields.</p>";
		$msgbox.= $form;
	}
	
	else

	#add the form data to the guestbook database table
	{
		$date=$year."-".$month."-".$day." 00:00:00";
		#connect to MySQL
		include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
 
		$unique_name = date("U").".jpg";  
		if( $_FILES['image']['name'] != "" )
		{
			if((substr($_FILES['image']['name'],  -3)!="jpg" and substr($_FILES['image']['name'],  -3)!="JPG"))
			{
				header("Location:new_insert.php?id=jpg");exit();
			}
			copy ( $_FILES['image']['tmp_name'], '../imgs/photos/' . $unique_name ) 
			or die( header("Location:$self?id=toobig") );
			$image = '../imgs/photos/' . $unique_name;
			include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
			image_resize(740,740,'740',$image);
			image_resize(100,100,'100',$image);
			image_resize(140,140,'140',$image);
			image_resize(250,250,'250',$image);
			image_resize(580,580,'580',$image);
		}
	
		$text = trim($text, "'");
		$text= str_ireplace("<br>", "\n", $text);
		$text= str_ireplace("<BR/>", "\n", $text);
		#create the SQL query
		if($text)
		{
		$sql = "insert into content (text,title, image, link,date,page) 
		values (\"$text\",\"$title\",\"$image\", \"$link\", \"$date\",\"news\")"; 
		$rs = mysql_query($sql) or die ("Could not execute SQL query");
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newnews",$auth,$text,$title);
			header("Location:index.php");
			
			$msgbox = "<div class=\"middle\">Thank you - your entry has been saved.</div>";
   
			$msgbox.= "<div class=\"middle\"><a href = \"../news/\">";

			$msgbox.= "Back</a></div>";
		}
	}

	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="new";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>  
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit News</h2>
<?php 
	echo $msgbox; 
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>