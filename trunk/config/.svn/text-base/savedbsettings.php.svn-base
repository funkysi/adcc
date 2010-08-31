<?php
	if(isset($_POST['dbhost']))
	{
		$host=$_POST['dbhost'];
	}
	else $host=null;
	if(isset($_POST['dbname']))
	{
		$dbname=$_POST['dbname'];
	}
	else $dbname=null;
	if(isset($_POST['dbusername']))
	{	
		$dbusername=$_POST['dbusername'];
	}
	else $dbusername=null;
	if(isset($_POST['dbpassword']))
	{	
		$dbpassword=$_POST['dbpassword'];
	}
	else $dbpassword=null;	
	if($host!='' and $dbname!='' and $dbusername!='' and $dbpassword!='')
	{
		$filename = $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
		$file = fopen ($filename, "w");
		fwrite ($file, "<?php\n 
		\$cfg['host']='" . $host . "'; \n
		\$cfg['dbname']='" . $dbname . "'; \n
		\$cfg['dbuser']='" . $dbusername . "'; \n
		\$cfg['dbpass']='" . $dbpassword . "'; \n
		\$cfg['backup']='/var/www/html/private/adcc';\n
# /var/www/html/private/adcc\n
# \$cfg['backup'] is the path to where sql and tar backup files are saved to when backup/update.php script is ran
		?>");
		fclose ($file);
	}
	
?>
<?php
	$filename = $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
	if (file_exists($filename)) {
	include $filename;
	$conn = mysql_connect( $cfg['host'], $cfg['dbuser'], $cfg['dbpass'] );
	$open = mysql_select_db( $cfg['dbname'] );
	
	}
	if($conn and !$open)
	{
		
		$query = "create database ".$cfg['dbname'];
		$result  = mysql_query($query);
		mysql_select_db( $cfg['dbname'] );
		
		$create = $_SERVER["DOCUMENT_ROOT"].'/db/structure.sql';
		$file = fopen ($create, "r");
		$filer = fread($file,filesize($create));

		$filer = explode(";", $filer);
		$filer_count = count($filer);
		for($i=0;$i<$filer_count;$i++)
		{
			$result = mysql_query($filer[$i]);
		}

		fclose ($file);
		$update = $_SERVER["DOCUMENT_ROOT"].'/db/updatedb.sql';
		$file = fopen ($update, "r");
		$filer = fread($file,filesize($update));

		$filer = explode(";", $filer);
		$filer_count = count($filer);
		for($i=0;$i<$filer_count;$i++)
		{
			$result = mysql_query($filer[$i]);
		}

		fclose ($file);
	}
	if (file_exists($filename)) {
	include $filename;
	$conn = mysql_connect( $cfg['host'], $cfg['dbuser'], $cfg['dbpass'] );
	$open = mysql_select_db( $cfg['dbname'] );
	
	}
	if ($open) {
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
	include_once $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	$url = getconfig('url');
	if($url=='') $url=$_SERVER['HTTP_HOST'];
	$sitetitle = getconfig('title');
	$location = getconfig('location');
	$email = getconfig('email');
	$nemail = getconfig('notifyemail');
	$bg = getconfig('bg');
	$logo = getconfig('logo');
	$analytics = getconfig('Analytics');
	$sitemap = getconfig('Sitemap');
	$webmaster = getconfig('webmaster');
	$awa = getconfig('awa');
	if($awa!='') $awa="checked=\"checked\"";
	}
	else header( "Location:index.php" ); 
?>
<div class="left-content padding">
	<a name="content"></a>
<h2 class="middle bold">Edit Site Settings Page 2</h2>
<p class="middle">These settings are used throughout the website.</p>

<form action="savesitesettings.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<label for="url">URL: </label>
		<input id="url" name="url" type="text" size="46" value="<?php echo $url; ?>"><br/>
		
		<label for="sitetitle">Website Title: </label>
		<input id="sitetitle"  name="sitetitle" type="text" size="46" value="<?php echo $sitetitle; ?>"><br/>
		
		<label for="location">Location: </label>
		<input id="location" name="location" type="text" size="46" value="<?php echo $location; ?>"><br/>
		
		<label for="email">Email: </label>
		<input id="email" name="email" type="text" size="46" value="<?php echo $email; ?>"><br/>
		
		<label for="nemail">Notification Email: </label>
		<input id="nemail" name="nemail" type="text" size="46" value="<?php echo $nemail; ?>"><br/>
		
		<label for="bg">Background Image: </label>
		<input id="bg" name="bg" type="file" size="46" value="<?php echo $bg; ?>"><br/>
		<?php if($bg!="") echo "<label>Background Image: </label><img alt=\"bg\" src=\"".str_replace('photos','250',$bg)."\" /><br/>
		<label for=\"delbg\">Delete Background Image: </label>
		<input id=\"delbg\" name=\"delbg\" type=\"checkbox\" ><br/>";?>
		
		<label for="logo">Logo: </label>
		<input id="logo" name="logo" type="file" size="46" value="<?php echo $logo; ?>"><br/>
		<?php if($logo!="") echo "<label>Logo: </label><img alt=\"logo\" src=\"".str_replace('photos','250',$logo)."\" /><br/>
		<label for=\"dellogo\">Delete Logo: </label>
		<input id=\"dellogo\" name=\"dellogo\" type=\"checkbox\" ><br/>";?>
		
		<label for="analytics">Google Analytics: </label>
		<input id="analytics" name="analytics" type="text" size="46" value="<?php echo $analytics; ?>"><br/>
		
		<label for="sitemap">Sitemap: </label>
		<input id="sitemap" name="sitemap" type="text" size="46" value="<?php echo $sitemap; ?>"><br/>
		
		<label for="webmaster">Webmaster: </label>
		<input id="webmaster" name="webmaster" type="text" size="46" value="<?php echo $webmaster; ?>"><br/>
		
		<label for="awa">Awards for All: </label>
		<input id="awa" name="awa" type="checkbox" <?php echo $awa; ?>><br/>
		
		
		<label>&nbsp;</label>
		<input class="advanced" type="submit" value="Update" />
	</fieldset>
</form>


</div>
<?php 
	if ($open) {
		include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
	}
?>
</div>
</body>
</html>
