<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
 
	$title=" - Edit Home Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="index";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit Home Page</h2>
<?php
	$id=$_GET['id'];
	$username="web12-adcc";
	$password="adcc";
	$database="web12-adcc2";
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query=" SELECT * FROM content WHERE id='$id'";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	

	$i=0;
	while ($i < $num) 
	{
		$text=mysql_result($result,$i,"text");
		$title=mysql_result($result,$i,"title");
		$date=mysql_result($result,$i,"date");
		$link=mysql_result($result,$i,"link");
		$image=mysql_result($result,$i,"image");
		$year = substr($date, 0, 4);
		$month = substr($date,5,2);
		$day = substr($date, 8,2);
		$hour = substr($date, 11,2);
		$min = substr($date, 14,2);
		$sec = substr($date, 17,2);
?>
<form action="ho_edit2.php" method="post">
	<fieldset>
		<label for="caption">Title: </label>
		<textarea id="caption" cols="35" rows="5" name="title" ><?php echo $title; ?></textarea><br/>
		<label for="text">Main Text: </label>
		<textarea id="text" cols="35" rows="5" name="text" ><?php echo $text; ?></textarea><br/>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input id="update" type="submit" value="Update" />
	</fieldset>
</form>
<form action="ho_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input id="del" type="submit" value="Delete" />
	</fieldset>
</form>
<?php
		++$i;
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
