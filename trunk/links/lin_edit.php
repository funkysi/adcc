<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Links Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="links";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>  
    <div class="left-content padding">
	<a name="content"></a><h2 class="middle bold">Edit Link</h2>
<?php
	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/db/dblinks.php';
	$ans = getlinks("where id = ".$id);
	$linktext=$ans[0]['linktext'];
	$link=$ans[0]['link'];
	$pri=$ans[0]['pri'];
	$description=$ans[0]['description'];
 ?>
<form action="lin_edit2.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<label for="pri">Link Priority (0-High, 100-Low): </label>
		<input id="pri" size ="40" type="text" name="pri" value="<?php echo $pri; ?>" /><br/>
		<label for="text">Link Text: </label>
		<input id="text" size ="40" type="text" name="linktext" value="<?php echo $linktext; ?>" /><br/>
		<label for="url">Link Url: </label>
		<input id="url" size ="40" type="text" name="link" value="<?php echo $link; ?>" /><br/>
		<label for="desc">Link Description: </label>
		<textarea id="desc" cols="35" rows="10" name="description" ><?php echo $description; ?></textarea><br/>

		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input type="submit" id="update" value="Update" />
	</fieldset>
</form>
<form action="lin_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset class="delete">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input type="submit" id="del" value="Delete" />
	</fieldset>
</form>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
