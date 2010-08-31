<?php 

	$title=" - Advanced Map Settings";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body>
<?php 
	$area="location";
	$page="location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	$map1 = getconfig("livemap1");
	$map2 = getconfig("livemap2");
	$map3 = getconfig("localmap1");
	$map4 = getconfig("localmap2");

		$map1 = getconfig("livemap1");
		$map2 = getconfig("livemap2");

	$long = getconfig("longitude");
	$lat = getconfig("latitude");
	$zoom = getconfig("zoom");	
?>
    <div class="left-content padding">
	<a name="content"></a><h2 class="bold middle">Advanced Map Settings</h2>
	<p>These are advanced settings that control who the map displays, be careful when making changes.</p>
	<p class="padding">To convert a UK Post Code to longitude and latitude try the following tool:</p>
	<p><a target="_blank" href="http://www.streetmap.co.uk/streetmap.dll?GridConvert?NG58DR&PostCode">http://www.streetmap.co.uk/streetmap.dll?GridConvert</a></p>
	<p class="padding">Please note that Arnold and District Camera Club is not responsible for the accuracy of information from external sites.</p>
<form action="createmapjs2.php" method="post">
	<fieldset>
		<label for="map1">Google Maps Api Url 1: </label>
		<input id="map1" type="text" name="map1" size="35" value="<?php echo $map1; ?>"><br/>
		<label for="map2">Google Maps Api Url 2: </label>
		<input id="map2" type="text" name="map2" size="35" value="<?php echo $map2; ?>"><br/>
		<label for="long">Longitude: </label>
		<input id="long" type="text" name="long" size="35" value="<?php echo $long; ?>"><br/>
		<label for="lat">Latitude: </label>
		<input id="lat" type="text" name="lat" size="35" value="<?php echo $lat; ?>"><br/>
		<label for="zoom">Zoom: </label>
		<input id="zoom" type="text" name="zoom" size="35" value="<?php echo $zoom; ?>"><br/>
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