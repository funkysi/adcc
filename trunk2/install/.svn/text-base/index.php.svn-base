<?php
$dbhost=$_POST['dbhost'];
$dbname=$_POST['dbname'];
$dbuser=$_POST['dbuser'];
$dbpass=$_POST['dbpass'];
$name=$_POST['name'];
$email=$_POST['email'];
$url=$_POST['url'];
$path=$_POST['path'];
$title=$_POST['title'];
$location=$_POST['location'];
$details=$_POST['details'];
$description=$_POST['description'];
$bgimg=$_POST['bgimg'];
$logoimg=$_POST['logoimg'];
$col0=$_POST['col0'];
$col1=$_POST['col1'];
$col2=$_POST['col2'];
$col3=$_POST['col3'];
$col4=$_POST['col4'];
$col5=$_POST['col5'];
$col6=$_POST['col6'];
$col7=$_POST['col7'];
$col8=$_POST['col8'];
$col9=$_POST['col9'];
$filename = substr($_SERVER['SCRIPT_FILENAME'],0,-18).'/include/config.php';

if (file_exists($filename)) {
	//$goto = "adcc.funkygoth/"
	//$goto = substr($goto,0,-18);
	header("Location:edit.php");
    //echo $filename;
} else {
    echo "";
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>

<title>Website Setup</title>

<meta name="Author" content="Simon Foster" />
<meta name="verify-v1" content="SNewew1I6SbjTaG1JPKk+LZ1iEcMRFpZGhCzg4MR/vo=" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="shortcut icon" href="http://adcc.funkygoth/favicon.ico" />
<script src="../scripts/color_select.js" type="text/javascript"></script>
<style type="text/css">
fieldset{

	border:0px solid #000;
}
label{
	display:block;
	float:left;
	width:15em;

	clear:both;
}
input, select{

	margin-bottom:5px;
}
body{
	
	width:780px;
	position:relative;
	left:50%;
	margin-left:-390px;
	padding-bottom:15px;
	margin-bottom:5px;
	margin-top:5px;
}
</style>


</head>
	<body onload="colorStore(0);colorStore(1);colorStore(2);colorStore(3);colorStore(4);colorStore(5);colorStore(6);colorStore(7);colorStore(8);colorStore(9)">
	<p>The file <?php echo $filename; ?> does not exist</p>
	<p>Please enter your database details</p>
	<p>Please make sure the following folders are writable by your webserver</p>
	<ul>
	<li>css</li>
	<li>include</li>
	<li>imgs</li>
	<li>imgs/photos</li>
	<li>rss</li>
	</ul>
	<form action="database.php" method="post" enctype="multipart/form-data">
	<fieldset>
	<label for="dbhost">Database Host: </label><input id="dbhost" size ="35" type="text" name="dbhost" value="localhost" /><br/>
	<label for="dbname">Database Name: </label><input id="dbname" size ="35" type="text" name="dbname" value="adcc_live" /><br/>
	<label for="dbuser">Database Username: </label><input id="dbuser" size ="35" type="text" name="dbuser" value="bugs" /><br/>
	<label for="dbpass">Database Password: </label><input id="dbpass" size ="35" type="password" name="dbpass" value="bugs" /><br/>
	<label for="url">Url of Website: </label><input id="url" size ="35" type="text" name="url" value="http://<?php echo $_SERVER["HTTP_HOST"];?>/" /><br/>
	<label for="path">Path Website: </label><input id="path" size ="35" type="text" name="path" value="<?php echo $_SERVER["DOCUMENT_ROOT"];?>/" /><br/>
	<label for="name">Name of Administrator: </label><input id="name" size ="35" type="text" name="name" value="Simon" /><br/>
	<label for="email">Email address of Administrator: </label><input id="email" size ="35" type="text" name="email" value="simon@physics.org" /><br/>
	<label for="title">Title of Website: </label><input id="title" size ="35" type="text" name="title" value="ADCC Test" /><br/>
	<label for="location">Location of Website: </label><input id="location" size ="35" type="text" name="location" value="Arnold, Nottingham, UK" /><br/>
	<label for="description">Club Description: </label><textarea id="description" rows="6" cols ="27" name="description">Arnold &amp; District Camera Club. The club is based in the town of Arnold, approximately five miles north of Nottingham city centre.
We are a group of amateur photographers and enthusiasts dedicated to promoting photography within our area. Our members range in skill from the beginner to the
accomplished amateur.</textarea><br/>
	<label for="details">Club Details: </label><textarea id="details" rows="6" cols ="27" name="details">&lt;h2>Affiliated to the Photographic Alliance of Great Britain through the North and East Midlands Photographic Federation.&lt;/h2>
&lt;h2>Member of the Gedling Borough Arts Association.&lt;/h2></textarea><br/>
<label for="logoimg">Background Image: </label><input id="bgimg" size ="35" type="file" name="bgimg"  /><br/>
<label for="bgimg">Logo Image: </label><input id="logoimg" size ="35" type="file" name="logoimg"  /><br/>
<label for="awa">Awards for All: </label><input id="awa" size ="35" type="checkbox" name="awa"  /><br/>
<label for="col0">Bg Colour: </label><input id="col0" size ="35" value="#EfEfFF" type="text" name="col0" onblur="colorStore('0');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="0" class="pal" id="c0" /><br/>
<label for="col1">Main Font Colour: </label><input id="col1" size ="35" value="#090397" type="text" name="col1" onblur="colorStore('1');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="1" class="pal" id="c1" /><br/>
<label for="col2">Alternative Font Colour: </label><input id="col2" size ="35" value="#f70400" type="text" name="col2" onblur="colorStore('2');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="2" class="pal" id="c2" /><br/>
<label for="col3">Link Colour </label><input id="col3" size ="35" value="#000" type="text" name="col3" onblur="colorStore('3');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="3" class="pal" id="c3" /><br/>
<label for="col4">Table Background Colour: </label><input id="col4" size ="35" value="#dedfff" type="text" name="col4" onblur="colorStore('4');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="4" class="pal" id="c4" /><br/>
<label for="col5">Dashed line Colour: </label><input id="col5" size ="35" value="#eeeeee" type="text" name="col5" onblur="colorStore('5');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="5" class="pal" id="c5" /><br/>
<label for="col6">Sidebar Background Colour: </label><input id="col6" size ="35" value="#aabbcc" type="text" name="col6" onblur="colorStore('6');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="6" class="pal" id="c6" /><br/>
<label for="col7">Footer Background Colour: </label><input id="col7" size ="35" value="#ffffcc" type="text" name="col7" onblur="colorStore('7');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="7" class="pal" id="c7" /><br/>
<label for="col8">News Dashed Line: </label><input id="col8" size ="35" value="#999999" type="text" name="col8" onblur="colorStore('8');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="8" class="pal" id="c8" /><br/>
<label for="col9">Menu Hover Colour: </label><input id="col9" size ="35" value="#aabbff" type="text" name="col9" onblur="colorStore('9');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled="disabled" name="9" class="pal" id="c9" /><br/>
	<label>&nbsp;</label><input type="submit" value="Add" />
	</fieldset>
	</form>

	</body>
	</html>
	<?php
}

?>
