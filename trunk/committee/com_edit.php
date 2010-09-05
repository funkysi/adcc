<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Committee";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';  
?>
<body>
<?php 
	$area="contact";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit Committee Member</h2>
<?php
include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	$id=$_GET['id'];
	$ans=getcurrentuser($id);
	
	$role=$ans[0]['role'];
	$displayname=$ans[0]['displayname'];
	$lastname=$ans[0]['lastname'];
	$image=$ans[0]['image'];
	$about=$ans[0]['about'];
	$email=$ans[0]['email'];
	$order=$ans[0]['order'];
?>
<form action="com_edit2.php" method="post" enctype="multipart/form-data">
	<fieldset>          
    	<label for="role">Role: </label>
		<input id="role" type="text" name="role" size="40" value="<?php echo $role; ?>" /><br/> 
		<label for="order">Order: </label>
		<input id="order" type="text" name="order" size="40" value="<?php echo $order; ?>" /> 
		<label for="displayname">First Name: </label>
		<input id="displayname" type="text" name="displayname" size="40" value="<?php echo $displayname; ?>" /> <br/>
		<label for="lastname">Last Name: </label>
		<input id="lastname" type="text" name="lastname" size="40" value="<?php echo $lastname; ?>" /><br/>
 		<?php if($image!="") echo "<label>Image: </label><img alt=\"\" src=\"../".str_replace('photos','250',$image)."\" /><br/>";?>
		<label for="image">Image: </label>
		<input id="image" type="file" name="image" size="35" /> 
		<label for="email">Email Address: </label>
		<input id="email" type="text" name="email" size="40" value="<?php echo $email; ?>" /> 
		<label for="about">About You: </label>
		<textarea id="about" cols="35" rows="10" name="about" ><?php echo $about; ?></textarea><br/>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="image" value="<?php echo $image; ?>" />
		<label>&nbsp; </label>
		<input type="submit" value="Update" />
	</fieldset>
</form>
<form action="com_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp; </label>
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