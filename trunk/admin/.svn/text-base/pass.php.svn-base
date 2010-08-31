<?php 
	#include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Change Password"; 
	$area="members";
	$page="password";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>  
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="bold middle">Change Your Password</h2>
	<p>The most secure passwords are a mixture of upper and lowercase letters and includes at least one number. 
	Please enter your existing password and type your new password twice.</p>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	$ans = getuserbyusername($auth);

	$username = $ans[0]['username'];

	$passw = $ans[0]['passw'];
?>
<form action="pass2.php" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $username; ?>" /><br/>
		<label for="username">Username: </label>
		<input size ="10" id="username" type="text" name="username" readonly="readonly" value="<?php echo $username; ?>" /><br/>
		<label for="old">Old Password: </label>
		<input size ="10" id="old" type="password" name="old" value="" /><br/>
		<label for="passw">Password: </label>
		<input size ="10" id="passw" type="password" name="passw" value="" /><br/>
		<label for="password">Retype Password: </label>
		<input size ="10" id="password" type="password" name="password2" value="" /><br/>
		<label>&nbsp;</label>
		<input id="update" type="submit" value="Update" />
	</fieldset>
</form>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>