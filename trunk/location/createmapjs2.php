<?php 

	$title=" - Advanced Map Settings";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="location";
	$page="location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
	<a name="content"></a>
	<h2 class="middle bold">Advanced Map Settings</h2>
<?php	
	$map1 = $_POST['map1'];
	$map2 = $_POST['map2'];
	$long = $_POST['long'];
	$lat = $_POST['lat'];
	$zoom = $_POST['zoom'];
	if( false )
	{
  
	}
	else
	{
		if($_SERVER['SERVER_NAME']=="arnoldanddistrictcameraclub.org.uk"  or $_SERVER['SERVER_NAME']=="www.arnoldanddistrictcameraclub.org.uk")
		{
			$ans = updateconfig("livemap1",$map1);
			$ans = updateconfig("livemap2",$map2);
		}
		else 
		{
			$ans = updateconfig("localmap1",$map1);
			$ans = updateconfig("localmap2",$map2);
		}	
		$ans = updateconfig("longitude",$long);
		$ans = updateconfig("latitude",$lat);
		$ans = updateconfig("zoom",$zoom);
		$lat2=$lat+0.0001;
		unlink($_SERVER["DOCUMENT_ROOT"].'/scripts/gmap.js');
		$filename = $_SERVER["DOCUMENT_ROOT"].'/scripts/gmap.js';
		$file = fopen ($filename, "w");
fwrite ($file, "var map;
var localSearch = new GlocalSearch();

var icon = new GIcon();
icon.image = \"http://www.google.com/mapfiles/marker.png\";
icon.shadow = \"http://www.google.com/mapfiles/shadow50.png\";
icon.iconSize = new GSize(20, 34);
icon.shadowSize = new GSize(37, 34);
icon.iconAnchor = new GPoint(10, 34);


function usePointFromPostcode(postcode, callbackFunction) {
	
	localSearch.setSearchCompleteCallback(null, 
		function() {
			
			if (localSearch.results[0])
			{		
				var resultLat = localSearch.results[0].lat;
				var resultLng = localSearch.results[0].lng;
				var point = new GLatLng(resultLat,resultLng);
				callbackFunction(point);
			}else{
				alert(\"Postcode not found!\");
			}
		});	
		
	localSearch.execute(postcode + \", UK\");
}

function placeMarkerAtPoint(point)
{
	var marker = new GMarker(point,icon);
	map.addOverlay(marker);
}

function setCenterToPoint(point)
{
	map.setCenter(point, 17);
}

function showPointLatLng(point)
{
	alert(\"Latitude: \" + point.lat() + \"Longitude: \" + point.lng());
}

function mapLoad() {
	if (GBrowserIsCompatible()) {
		map = new GMap2(document.getElementById(\"map\"));
		map.addControl(new GLargeMapControl());
		map.addControl(new GMapTypeControl());
		map.setCenter(new GLatLng(".$long.",".$lat."), ".$zoom.", G_HYBRID_MAP);
		var point2 = new GLatLng(".$long.",".$lat2.");  
		map.addOverlay(new GMarker(point2));
	}
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}

function addUnLoadEvent(func) {
	var oldonunload = window.onunload;
	if (typeof window.onunload != 'function') {
	  window.onunload = func;
	} else {
	  window.onunload = function() {
	    oldonunload();
	    func();
	  }
	}
}

addLoadEvent(mapLoad);
addUnLoadEvent(GUnload);
");
	fclose ($file);	
	include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
	sendemail("advloc",$auth);
	header("Location:index.php");
}
include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>