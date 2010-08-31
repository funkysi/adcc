<?php
	$filename = $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
	if (file_exists($filename)) {
	include $filename;
	$rs = mysql_connect( $cfg['host'], $cfg['dbuser'], $cfg['dbpass'] );
	$rs = mysql_select_db( $cfg['dbname'] );
	
	}
	if ($rs) {
	$cfg['host'];
	$cfg['dbuser'];
	$cfg['dbpass']; 
	$cfg['dbname'];
	
	$title=" - Site Config Settings";
	$area="members";
	$page="sitesettings";
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
	}
?>
<div class="left-content padding">
	<a name="content"></a>
<h2 class="middle bold">Edit Site Settings</h2>
<p class="middle">Please check you database settings first, these should be saved in a file called config.php saved in the include folder, make sure this file is writable.</p>

<form action="savedbsettings.php" method="post">
	<fieldset>
		<label for="dbhost">DB Host: </label>
		<input id="dbhost" name="dbhost" type="text" value="<?php echo $cfg['host']; ?>"><br/>
		<label for="dbname">DB Name: </label>
		<input id="dbname"  name="dbname" type="text" value="<?php echo $cfg['dbname']; ?>"><br/>
		<label for="dbusername">DB Username: </label>
		<input id="dbusername" name="dbusername" type="text" value="<?php echo $cfg['dbuser']; ?>"><br/>
		<label for="dbpassword">DB Password: </label>
		<input id="dbpassword" name="dbpassword" type="password" value="<?php echo $cfg['dbpass']; ?>"><br/>
		
		<label>&nbsp;</label>
		<input class="middle advanced" type="submit" value="Update" />
		<label>&nbsp;</label>
		<p class="nexticon"><a href="savedbsettings.php">Next</a></p>
	</fieldset>
</form>


</div>
<?php 
	if ($rs) {
		include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
	}
?>
</div>
</body>
</html>