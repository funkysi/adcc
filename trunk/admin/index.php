<?php
	if(isset($_COOKIE['auth_new']))
	{
		$auth = $_COOKIE['auth_new'];
	}
		else $auth=null;
	if(isset($_COOKIE['level_new']))
	{
		$level = $_COOKIE['level_new'];
	}
	else $level=null;
	#header( "Cache-Control:no-cache");
	if ($level =="1" or $level =="0" or $level =="2")
	{
		header( "Location:../admin/access.php" ); 
	}
		if(!isset($_POST['username']))  
		{
			$username = "";
		}
		else $username = $_POST['username'];
			
		if(!isset($_POST['passw']))  
		{
			$passw = "";
		}
		else $passw = $_POST['passw'];

		$passw = md5($passw);
		$self = $_SERVER['PHP_SELF'];
		$title=" - Members Login"; 
		include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	$msg = getuser($username,$passw);
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a> 
	<h2 class="middle bold">Club Members Login Page</h2>
	
	<p>Please enter your user details to log-in. If you have forgotten your login details please <a href="resetpwd.php">click here</a> and a new password will be emailed to you. </p>

<form action = "<?php echo($self); ?>" method = "post">
	<fieldset>
		<label class="bold" for="username">Username:</label>
		<input tabindex="1" id="username" alt="username" type = "text" name = "username" value="<?php echo $username ?>" /><br/>

		<label class="bold" for="passw">Password:</label>
		<input tabindex="2" id="passw" alt="password" type = "password" name = "passw" value=""/><br/>
		 
		<label>&nbsp;</label>
		<input tabindex="3" type = "submit" value = "Log In" />
	</fieldset>
</form>
<?php 
	if($username) echo $msg; 
?> 
<p class="bold padding middle">This area of the site is for club members only. </p>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>