<?php $filename = substr($_SERVER['SCRIPT_FILENAME'],0,-17).'/include/config.php';
include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
$title=" - Configuration Settings";$area="";
include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
include $filename;
?>
<body onLoad="colorStore(0);colorStore(1);colorStore(2);colorStore(3);colorStore(4);colorStore(5);colorStore(6);colorStore(7);colorStore(8);colorStore(9)">
<script type="text/javascript">
// Thanks to Steve Champeon (hesketh.com) for explaining the math in such a way that I could 
// understand it and create this tool
// Thanks to Roberto Diez for the idea to create the "waterfall" display
// Thanks to the Rhino book, I was able to (clumsily) set up the Color object

var cursor = 0;
var colType = 'hex';
var base = 16;
var ends = new Array(new Color,new Color);
var step = new Array(3);
var palette = new Array(new Color,new Color,new Color,new Color,new Color,new Color,new Color,new Color,new Color,new Color,new Color,new Color);



function Color(r,g,b) {
	this.r = r;
	this.g = g;
	this.b = b;
	this.coll = new Array(r,g,b);
	this.valid = cVerify(this.coll);
	this.text = cText(this.coll);
	this.bg = cText(this.coll);
}

function cVerify(c) {
	var valid = 'n';
	if ((!isNaN(c[0])) && (!isNaN(c[1])) && (!isNaN(c[2]))) {valid = 'y'}
	return valid;
}

function cText(c) {
	var result = '';
	var d = 1;
	if (colType == 'rgbp') {d = 2.55}
	for (k = 0; k < 3; k++) {
		val = Math.round(c[k]/d);
		piece = val.toString(base);
		if (colType == 'hex' && piece.length < 2) {piece = '0' + piece;}
		if (colType == 'rgbp') {piece = piece + '%'};
		if (colType != 'hex' && k < 2) {piece = piece + ',';}
		result = result + piece;
	}
	if (colType == 'hex') {result = '#' + result.toUpperCase();}
		else {result = 'rgb(' + result + ')';}
	return result;
}

function colorParse(c,t) {
	var m = 1;
	c = c.toUpperCase();
	col = c.replace(/[\#rgb\(]*/,'');
	if (t == 'hex') {
		if (col.length == 3) {
			a = col.substr(0,1);
			b = col.substr(1,1);
			c = col.substr(2,1);
			col = a + a + b + b + c + c;
		}
		var num = new Array(col.substr(0,2),col.substr(2,2),col.substr(4,2));
		var base = 16;
	} else {
		var num = col.split(',');
		var base = 10;
	}
	if (t == 'rgbp') {m = 2.55}
	var ret = new Array(parseInt(num[0],base)*m,parseInt(num[1],base)*m,parseInt(num[2],base)*m);
	return(ret);
}

function colorPour(pt,n) {
	var textObj = document.getElementById(pt + n.toString());
	var colObj = document.getElementById(pt.substring(0,1) + n.toString());
	if (pt == 'col') {temp = ends[n]} else {temp = palette[n]}
	if (temp.valid == 'y') {
		textObj.value = temp.text;
		colObj.style.backgroundColor = temp.bg;
	}
}

function colorStore(n) {
	var inVal = 'col'+n.toString();
	var inCol = document.getElementById(inVal).value;
	var c = colorParse(inCol,colType);
	ends[n] = new Color(c[0],c[1],c[2]);
	if (ends[n].valid == 'y') {colorPour('col',n)}
}


</script>
	<?php include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';?>
	<div class="left-content padding">
	<p>The file <?php echo $filename; ?> does exist</p>
	<p>Please enter your database details</p>
	
	<form action="database_edit.php" method="post" enctype="multipart/form-data">
	<fieldset>
	<label for="dbhost">Database Host: </label><input id="dbhost" size ="35" type="text" name="dbhost" value="<?php echo $cfg['host']; ?>" /><br/>
	<label for="dbname">Database Name: </label><input id="dbname" size ="35" type="text" name="dbname" value="<?php echo $cfg['dbname']; ?>" /><br/>
	<label for="dbuser">Database Username: </label><input id="dbuser" size ="35" type="text" name="dbuser" value="<?php echo $cfg['dbuser']; ?>" /><br/>
	<label for="dbpass">Database Password: </label><input id="dbpass" size ="35" type="password" name="dbpass" value="<?php echo $cfg['dbpass']; ?>" /><br/>
	<label for="url">Url of Website: </label><input id="url" size ="35" type="text" name="url" value="<?php echo $cfg['url']; ?>" /><br/>
	<label for="path">Path Website: </label><input id="path" size ="35" type="text" name="path" value="<?php echo $cfg['path'];?>/" /><br/>
	<label for="name">Name of Administrator: </label><input id="name" size ="35" type="text" name="name" value="<?php echo $cfg['name']; ?>" /><br/>
	<label for="email">Email address of Administrator: </label><input id="email" size ="35" type="text" name="email" value="<?php echo $cfg['email']; ?>" /><br/>
	<label for="title">Title of Website: </label><input id="title" size ="35" type="text" name="title" value="<?php echo $cfg['title']; ?>" /><br/>
	<label for="location">Location of Website: </label><input id="location" size ="35" type="text" name="location" value="<?php echo $cfg['location']; ?>" /><br/>
	<label for="description">Club Description: </label><textarea id="description" rows="6" cols ="27" name="description"><?php echo $cfg['description']; ?></textarea><br/>
	<label for="details">Club Details: </label><textarea id="details" rows="6" cols ="27" name="details"><?php echo $cfg['details']; ?></textarea><br/>
	<img src="../imgs/site/<?php echo $cfg['bg']; ?>"><br/>
<label for="logoimg">Background Image: </label><input id="bgimg" size ="35" type="file" name="bgimg"  /><br/>
<img src="../imgs/site/<?php echo $cfg['logo']; ?>"><br/>
<label for="bgimg">Logo Image: </label><input id="logoimg" size ="35" type="file" name="logoimg"  /><br/>
<label for="awa">Awards for All: </label><input id="awa" size ="35" type="checkbox" name="awa"  <?php if($cfg['awa']!='') echo "checked=\"checked\""; ?> /><br/>
<label for="col0">Bg Colour: </label><input id="col0" size ="35" value="#EfEfFF" type="text" name="col0" onBlur="colorStore('0');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c0" /><br/>
<label for="col1">Main Font Colour: </label><input id="col1" size ="35" value="#090397" type="text" name="col1" onBlur="colorStore('1');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c1" /><br/>
<label for="col2">Alternative Font Colour: </label><input id="col2" size ="35" value="#f70400" type="text" name="col2" onBlur="colorStore('2');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c2" /><br/>
<label for="col3">Link Colour </label><input id="col3" size ="35" value="#000" type="text" name="col3" onBlur="colorStore('3');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c3" /><br/>
<label for="col4">Table Background Colour: </label><input id="col4" size ="35" value="#dedfff" type="text" name="col4" onBlur="colorStore('4');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c4" /><br/>
<label for="col5">Dashed line Colour: </label><input id="col5" size ="35" value="#eeeeee" type="text" name="col5" onBlur="colorStore('5');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c5" /><br/>
<label for="col6">Sidebar Background Colour: </label><input id="col6" size ="35" value="#aabbcc" type="text" name="col6" onBlur="colorStore('6');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c6" /><br/>
<label for="col7">Footer Background Colour: </label><input id="col7" size ="35" value="#ffffcc" type="text" name="col7" onBlur="colorStore('7');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c7" /><br/>
<label for="col8">News Dashed Line: </label><input id="col8" size ="35" value="#999999" type="text" name="col8" onBlur="colorStore('8');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c8" /><br/>
<label for="col9">Menu Hover Colour: </label><input id="col9" size ="35" value="#aabbff" type="text" name="col9" onBlur="colorStore('9');" /><br/>
<label>&nbsp;</label><input type="text" size ="35" disabled class="pal" id="c9" /><br/>
	<label>&nbsp;</label><input type="submit" value="Add" />
	</fieldset>
	</form>
</div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
  </div> 
	</body>
	</html>