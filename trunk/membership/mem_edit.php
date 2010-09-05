<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';

	$title=" - Edit Membership Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="membership";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Edit Membership Page</h2>
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
<form action="mem_edit2.php" method="post">
   <fieldset>       
		<label for="text">Text: </label>
		<textarea id="text" cols="35" rows="10" name="text" ><?php echo $text; ?></textarea><br/> 
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<label>&nbsp;</label>
		<input type="submit" value="Update"/><br/>
	</fieldset>
</form>
<form action="mem_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<label>&nbsp;</label>
		<input type="submit" value="Delete"/><br/>
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