<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Users";
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit Members</h2>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=null;
	if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
	{
	$numrows = getfullusercount();

	$ans= getall_users();

	$arr = array();
	$brr = array();
	
	$j = 0;
	#loop through all records
	for ($i =0;$i<$numrows;$i++) 
	{
		$arr[$j] = $ans[$i]['username'];
		$brr[$j] = $ans[$i]['displayname']." ".$ans[$i]['lastname'];
		$j++;
	}
	$self = $_SERVER['PHP_SELF'];
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}
	else $type="";
	$max = count($arr);
	if(isset($_GET['type']))
	{
	    $type = $_GET['type'];
	}

	if(isset($_POST['submit']))
	{	
		$submit = $_POST['submit'];
	}
	echo "<div class=\"middle\"><form action=\"$self\" method=\"post\"><fieldset>
	<select name=\"type\">";

	for ($j = 0; $j < $max; $j++)
	{
	echo "<option value=\"".$arr[$j]."\" >".$brr[$j]."</option>";
	}

	echo "</select><input type=\"submit\" name=\"submit\" value=\"View\" /> </fieldset></form></div><br/>";
}
else $type=$auth;
	$query=" SELECT * FROM users WHERE username='$type'";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	
	if($status=="toobig") 
	{
		echo "<p class=\"middle red\">Image was too large to upload. Please only upload files less than 2MB.</p>";
	}
	if($status=="jpg") 
	{
		echo "<p class=\"red\">Please only upload images in jpg format.</p>";
	}
	$i=0;
	while ($i < $num) 
	{
		$type = mysql_result($result,$i,"username");
		$id=mysql_result($result,$i,"id");

		$role=mysql_result($result,$i,"role");
		$displayname=mysql_result($result,$i,"displayname");
		$lastname=mysql_result($result,$i,"lastname");
		$image=mysql_result($result,$i,"image");
		$about=mysql_result($result,$i,"about");
		$email=mysql_result($result,$i,"email");
?>
<form action="users_edit2.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
	<fieldset>  
<?php if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
	{	
		echo "<label for=\"role\">Role: </label>
		<input id=\"role\" type=\"text\" name=\"role\" size=\"40\" value=\"".$role."\" /><br/>";
		}
?>		
		<label for="displayname">First Name: </label>
		<input id="displayname" type="text" name="displayname" size="40" value="<?php echo $displayname; ?>" /><br/> 
		<label for="lastname">Last Name: </label>
		<input id="lastname" type="text" name="lastname" size="40" value="<?php echo $lastname; ?>" /><br/>
		<?php if($image!="") echo "<label>Image: </label><img alt=\"\" src=\"".str_replace('photos','250',$image)."\" /><br/>";?>
		<label for="image">Image: </label>
		<input id="image" type="file" name="image" size="35" /> 
		<label for="email">Email Address: </label>
		<input id="email" type="text" name="email" size="40" value="<?php echo $email; ?>" /> 
		<label for="about">About You: </label>
		<textarea id="about" cols="35" rows="10" name="about" ><?php echo $about; ?></textarea><br/> 
		<input type="hidden" name="type" value="<?php echo $type; ?>" />
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="image" value="<?php echo $image; ?>" />
		<label>&nbsp; </label>
		<input type="submit" value="Update" />
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