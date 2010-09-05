<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Committee Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="contact";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';  
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Insert New Committee Member</h2>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$query   = "SELECT COUNT(*) AS numrows FROM users WHERE LEVEL = 1";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];

	$sql = "select * from users WHERE LEVEL = '1' and role = '' order by lastname";

	#execute the query
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
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
	$type="";
	$msg="";
	$self = $_SERVER['PHP_SELF'];
	
	if(isset($_POST['type']))
	{
	    $type = $_POST['type'];
	}
	$max = count($arr);
	if(isset($_GET['type']))
	{
	    $type = $_GET['type'];
	}
	if(isset($_POST['role']))
	{
		$role = $_POST['role'];
	}	
	if(isset($_POST['order']))
	{
		$order = $_POST['order'];
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
	#the html form
	$form = "<form action=\"$self\" method=\"post\" enctype=\"multipart/form-data\"><fieldset>";
	$form.= "<label for=\"role\">Role: </label><input id=\"role\" type=\"text\" name=\"role\" ";
	$form.= "size=\"40\" /><br/> <label for=\"name\">Name: </label><select id=\"name\" name=\"type\"><br/>";
	for ($j = 0; $j < $max; $j++)
	{
		$form.= "<option value=\"".$arr[$j]."\" >".$brr[$j]."</option>";
	
	}
	$form.= "</select><br/><label for=\"order\">Order: </label>
	<input id=\"order\" value=\"10\" type=\"text\" name=\"order\"><br/>
	
	<label>&nbsp;</label><input type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";
	
	#on first opening display the form
	if( !$submit)
	{ 
		$msg = $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !$role ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<p class=\"middle red\">Please complete all fields.</p>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
 
		#connect to MySQL
	  

		#create the SQL query
		if($role)
		{
			$sql = "update users set role='$role', order_nu='$order' where username='$type'"; 
			$rs = mysql_query($sql) or die ("Could not execute SQL query");
			
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newcommittee",$auth,$type,$role);
			header("Location:index.php");
		}
	}
	echo $msg;
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
