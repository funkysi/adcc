<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
 
	$title=" - Edit Our Purpose"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="purpose";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Edit Our Purpose Page</h2>
<?php

	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query=" SELECT * FROM content WHERE id='$id'";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	

	$i=0;
	while ($i < $num) 
	{

		$text=mysql_result($result,$i,"text");
		$link=mysql_result($result,$i,"link");
		$image=mysql_result($result,$i,"image");

?>
<form enctype="multipart/form-data" action="pu_edit2.php" method="post">
	<fieldset>
		<label for="text">Text: </label>
		<textarea id="text" cols="35" rows="10" name="text" ><?php echo $text; ?></textarea><br/>
		<?php if($image!="") {echo "<label>Image: </label><img alt=\"\" src=\"../".str_replace('photos','250',$image)."\" /><br/><label for=\"image\">Delete Image: </label><input id=\"delimage";
		echo "\" type=\"checkbox\" name=\"delimage\" /><br/>";}?>
		<label for="image">New Image: </label>
		<input id="image" type="file" name="image" size="35" /><br/>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input id="update" type="submit" value="Update" />
	</fieldset>
</form>
<form action="pu_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="image" value="<?php echo $image; ?>" />
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