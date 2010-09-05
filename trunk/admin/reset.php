<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$title=" - Reset User Password"; 
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=null;
		if(isset($_GET['type']))
	{
		$type = $_GET['type'];
	}
		if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php'; 

	if ($status==1)
	{
		$password = createRandomPassword();
		$reset=md5($password);
		$ans = updatepassword($type,$reset);
		$status=2;
		header("Location:reset.php?status=2&password=$password&username=$type");
		
	}
	if($status==2)
	{
		#echo "<p class=\"padding middle\">Username: ".$type." <br/>Password: ".$password."</p>";
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("resetpwd",$type,$password);
		header("Location:reset.php");
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area = "members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>	  
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Reset User Password</h2>
<?php
	$numrows = getfullusercount();
	$ans = getall_users();
	$arr = array();
	$brr = array();
	$j = 0;
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=0;
		if(isset($_GET['username']))
	{
		$type=$_GET['username'];
	}
	else $type=null;
		if(isset($_GET['password']))
	{
		$password=$_GET['password'];
	}
	else $password=null;
	for ($i =0;$i<$numrows;$i++) 
	{
		$arr[$j] = $ans[$i]['username'];
		$brr[$j] = $ans[$i]['displayname']." ".$ans[$i]['lastname'];
		$j++;
	}
	$self = $_SERVER['PHP_SELF'];

	$max = count($arr);

	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	echo "<div class=\"middle\"><form action=\"$self?status=1\" method=\"post\"><fieldset><select name=\"type\">";

	for ($j = 0; $j < $max; $j++)
	{
		echo "<option value=\"".$arr[$j]."\" >".$brr[$j]."</option>";
	}

	echo "</select><input type=\"submit\" name=\"submit\" value=\"Reset\" /> </fieldset></form></div>";

?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php'; 
?>
</div>
</body>
</html>