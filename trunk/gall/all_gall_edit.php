<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Edit Gallery";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="gall";
	$page="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
?>	  
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit Gallery</h2>
<?php
	if($perm==true and $permlevel==true) 
	{
		$numrows = getfullusercount();

		$ans1 =  getuploadusers();

		$arr = array();
		$brr = array();
		$j = 0;

		for ($i =0;$i<$numrows;$i++) 
		{
			$arr[$j] = $ans1[$i]['username'];
			$brr[$j] = $ans1[$i]['displayname']." ".$ans1[$i]['lastname'];
			$j++;
		}
		$self = $_SERVER['PHP_SELF'];
		if(isset($_POST['type']))
		{
			$type = $_POST['type'];
		}
		$max = count($arr);
		if(isset($_GET['type']))
		{
		    $type = $_GET['type'];
		}
		if(isset($_POST['submit']))
		{
			$submit = $_POST['submit'];
		}
		if(isset($_REQUEST['user']))
		{
			header( "Location:all_gall_edit.php?type=$type" ); exit();
		}
		echo "<div class=\"middle\">
		<form action=\"$self?user=true\" method=\"post\">
		<p>
		<select name=\"type\">";
		for ($j = 0; $j < $max; $j++)
		{
			echo "<option value=\"".$arr[$j]."\" >".$brr[$j]."</option>";
		}
		echo "
		</select><br/>
		<input class=\"picture\" id=\"submit\" type=\"submit\" name=\"submit\" value=\"View\" />
		</p>
		</form>
		</div>";
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
		}
	}
	include $_SERVER["DOCUMENT_ROOT"].'/gall/null_check.php';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';
	if($type==$auth)
	{
	
	$dis = getuserbyusername($type);
		echo "<p class=\"padding middle add\"><a href=\"all_upload.php?type=".$type."\">Upload New Images for ".$dis[0]['displayname']." ".$dis[0]['lastname']."</a></p>";
		echo "<p class=\"middle person edit\"><a href=\"../admin/edit_about.php\">Edit About Me page</a></p>";
	}
	else
	{
		$dis = getuserbyusername($type);
		echo "<p class=\"padding middle add\"><a href=\"all_upload.php?type=".$type."\">Upload New Images for ".$dis[0]['displayname']." ".$dis[0]['lastname']."</a></p>";
		
	}
	$ans = getimagebyusername2($type);				
	$count = getcountimagebyusername($type,'0','100000');
	$i=0;
	while ($i < $count) 
	{
		$name=$ans[$i]['name'];
		$caption=$ans[$i]['caption'];
		$image=$ans[$i]['image'];
		$info=$ans[$i]['info'];
		$id=$ans[$i]['id'];
?>
<form action="all_gall_edit2.php" method="post">
	<fieldset>        
		<label>Name: </label>
		<input readonly="readonly" size ="46" type="text" name="name" value="<?php echo $name; ?>" /><br/>
		<label>Image: </label>
		<img alt="<?php echo $image; ?>" src="<?php echo str_replace('photos','250',$image); ?>" /><br/>
		<label for="caption<?php echo $i; ?>">Caption: </label>
		<input id="caption<?php echo $i; ?>" size ="46" type="text" name="caption" value="<?php echo $caption; ?>" /><br/>
		<label for="details<?php echo $i; ?>">More Details about the photo: </label>
		<textarea id="details<?php echo $i; ?>" cols="55" rows="10" name="info" ><?php echo $info; ?></textarea><br/>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label >&nbsp; </label>
		<input  id="update" class="pos" type="submit" value="Update" />
	</fieldset>
</form>
<form action="all_gall_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset> 
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="image" value="<?php echo $image; ?>" />
		<label >&nbsp; </label>
		<input id="del" type="submit" value="Delete" />
	</fieldset>
</form>
<form action="addtag.php?id=<?php echo $id; ?>&type=<?php echo $type; ?>" method="post">
	<fieldset>
		<label >Current Tags: </label>
		<span class="input"><?php include $_SERVER["DOCUMENT_ROOT"].'/gall/viewtaglink.php'; ?></span>
		<input type="submit" class="hidden" value="not here"/><br/>
		<label for="tag<?php echo $i; ?>">New Tag: </label>
		<input id="tag<?php echo $i; ?>" type="text" name="tag" size="46" /><br/> 
		<label>&nbsp;</label>
		<input id="add" type="submit" value="Add Tag"/>
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
