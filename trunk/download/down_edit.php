<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Downloads";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="download";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>  
    <div class="left-content padding">
	<a name="content"></a><h2 class="bold middle">Edit Download</h2>
<?php
	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';
	$ans = getdownload("where id = ".$id);
	#$ufile=$ans[0]['ufile'];
	$comment=$ans[0]['comment'];
	$disp=$ans[0]['disp'];
?>
<form action="down_edit2.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<label for="desc">Description: </label>
		<textarea id="desc" cols="35" rows="5" name="comment" ><?php echo $comment; ?></textarea><br/>
		<label for="name">File Name thats displayed: </label>
		<input id="name" type="text" name="disp" size="35" value="<?php echo $disp; ?>" /><br/>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input type="submit" value="Update" />
	</fieldset>
</form>
<form action="down_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input type="submit" value="Delete" />
	</fieldset>
</form>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
