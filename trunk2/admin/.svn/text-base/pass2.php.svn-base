<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Change Password"; 
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body >
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>	
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="bold middle">Change Your Password</h2>
<?php
	$username=$_POST['id'];
	$passw=$_POST['passw'];
	$pass=$passw;
	$password2=$_POST['password2'];
	$old=$_POST['old'];
	$old=md5($old);
	$passw=md5($passw);
	$password2=md5($password2);
	include_once $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	$ans = getuserbyusername($auth);

	$passwo=$ans[0]['passw'];

	if( !($old==$passwo) )
	{
		$msg = "<p class=\"middle\">Please retype existing password</p>
		<p class=\"middle\"><a href=\"javascript:history.back(1)\">Back</a></p></div>";
	  
		echo($msg);
	}
	else
	if( !($passw==$password2) )
	{
		$msg = "<p class=\"middle\">Please retype password</p>
		<p class=\"middle\"><a href=\"javascript:history.back(1)\">Back</a></p></div>";
 
		echo($msg);
	}
	else
	{
		
		updatepassword($auth,$password2);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("resetpwd",$auth,$pass);
		header("Location:index.php");

		# old is what user thinks old password is passwo is what it actualy is
		# password2 and passw are what the user enters in the new password fields
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</div>
</body>
</html>