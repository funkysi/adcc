<?php 

	$title=" - Location";
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
?>
	  
    <div class="left-content padding">
	<a name="content"></a><h2 class="bold middle">Edit Map Page</h2>
<?php
	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';
	$ans = getcontent("content","page = 'location' and id = ".$id);

	$text=$ans[0]['text'];
	$link=$ans[0]['link'];
	$image=$ans[0]['image'];
?>
<form enctype="multipart/form-data" action="loc_edit2.php" method="post">
	<fieldset>
		<label for="text">Text: </label>
		<textarea id="text" cols="35" rows="5" name="text" ><?php echo $text; ?></textarea><br/>
		<?php if($image!="") {echo "<label>Image: </label><img alt=\"\" src=\"../".str_replace('photos','250',$image)."\" /><br/><label for=\"image\">Delete Image: </label><input id=\"delimage";
		echo "\" type=\"checkbox\" name=\"delimage\" /><br/>";}?>
		<label for="image">Image: </label>
		<input id="image" type="file" name="image" size="35" value="<?php echo $image; ?>" /><br/>
		<label>&nbsp;</label>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="image" value="<?php echo $image; ?>" />
		<input id="update" type="submit" value="Update" />
	</fieldset>
</form>
<form action="loc_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<label>&nbsp;</label>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input id="del" type="submit" value="Delete" />
	</fieldset>
</form>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
