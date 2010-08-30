<?php
	if($_SERVER["REQUEST_URI"]=="/index.php" ) header("Location:/");
	$title=" - Home"; 
	$path = dirname(__FILE__);
	include $path.'/include/connect.php';
	include $path.'/db/dbconfig.php';
$tinymce=true;
	$filename = $path.'/include/header2.php';
	include $filename; 
?>
<body>
<?php
	$area="index";
	$page="home";
	include $path.'/include/auth.php';
    include $path.'/include/menu.php';
?>    
<div class="left-content padding">
	<div class="right-content">
		<p class="right-title bold">Club Events:</p>
<?php
	 
		include $path.'/schedule/recent-events.php';
?>
		<div class = "subphoto padding hslice" id="gallery">
			<p class="right-title bold">A Random Photo from our Members Gallery</p>
<?php
		include $path.'/gall/randpic.php';		
?>
		</div>
<?php 
		include $path.'/gall/gall_stats.php';
		include $path.'/gall/tagcloud.php';
?>
	</div>
	<a name="content"></a>
<?php
		include $path.'/db/dbcontent.php';	
		$ans = getcontent("content","page = 'home'");
		$count = getcount("content","page = 'home'");
		for ($i =0;$i<$count;$i++)
		{
			if($ans[$i]['title']=='') echo ""; 
			else echo "<h2 class=\"bold\">".$ans[$i]['title']."</h2>";
			
			if($ans[$i]['text']=='') echo ""; 
			else echo "<p>".$ans[$i]['text']."</p>";
			
			if($perm==true ) 
			echo "<ul><li class=\"first padding edit\"><a href=\"../../home/ho_edit.php?id=".$ans[$i]['id']."\">Edit Item</a></li>
			<li class=\"prev padding add\"><a href=\"../../home/ho_insert.php\">Insert New</a></li>
			<li class=\"next padding delete\"><a href=\"../../home/ho_delete.php?id=".$ans[$i]['id']."\">Delete</a></li></ul>";
		}
		if($count==0) 
		{
			if($perm==true ) echo "<ul><li class=\"prev padding add\"><a href=\"../../home/ho_insert.php\">Insert New</a></li></ul>";
		}
					
?>			
</div>
<?php		
		$news=1;
		include $path.'/include/footer.php';
		
?>
</div>
</body>
</html>
