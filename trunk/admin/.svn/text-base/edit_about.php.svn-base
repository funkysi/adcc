<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
 
	$title=" - About";
	$area="members";
	$tinymce="true";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit About Me</h2>
<?php
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=null;

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	
	$sql = "select * from users where username='$auth'";
	$result=mysql_query($sql);
	$num=mysql_numrows($result);
	
	if($status=="toobig") 
	{
		echo "<p class=\"red\">Image was too large to upload. Please only upload files less than 2MB.</p>";
	}
	if($status=="jpg") 
	{
		echo "<p class=\"red\">Please only upload images in jpg format.</p>";
	}
	$i=0;
	while ($i < $num) 
	{
		$displayname=mysql_result($result,$i,"displayname");
		$lastname=mysql_result($result,$i,"lastname");
		$about=mysql_result($result,$i,"about");
		$image=mysql_result($result,$i,"image");
		$email=mysql_result($result,$i,"email");
?>
<form action="edit_about2.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<label >Your Name: </label>
		<?php echo $displayname." ".$lastname; ?><br/>
		<?php if($image!="") { ?>
		<label for="current">Current Image File: </label>
		<img id="current" src="<?php echo str_replace('photos','250',$image); ?>" alt="<?php echo $displayname." ".$lastname; ?>" /><br/>
		<?php } ?>
		<label for="file">Select Image File: </label>
		<input id="file" type="file" name="image" size="35" value="<?php echo $image; ?>"/><br/>
		<label for="about">About Yourself: </label>
		<textarea id="about" cols="35" rows="10" name="about" ><?php echo $about; ?></textarea><br/>
		<label for="email">Email Address: </label>
		<input id="email" type="text" name="email" size="40" value="<?php echo $email; ?>" /> <br/>
		<input type="hidden" name="auth" value="<?php echo $auth; ?>"/>
		<input type="submit" value="Submit" /> 
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
