<?php
	if($_SERVER["REQUEST_URI"]=="/index.php" ) header("Location:/");
	$title=" - Home"; 
	$filename = $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
	include $filename; 
?>
<body>
<?php
	$area="index";
    include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>    
<div class="left-content padding">
	<div class="right-content">
		<p class="right-title bold">Club Events:</p>
<?php
	 
		include $_SERVER["DOCUMENT_ROOT"].'/schedule/recent-events.php';
?>
		<div class = "subphoto padding hslice" id="gallery">
			<p class="right-title bold">A Random Photo from our Members Gallery</p>
<?php
		include $_SERVER["DOCUMENT_ROOT"].'/gall/randpic.php';		
?>
		</div>
<?php 
		include $_SERVER["DOCUMENT_ROOT"].'/gall/gall_stats.php';
		include $_SERVER["DOCUMENT_ROOT"].'/gall/tagcloud.php';
?>
	</div>
	<a name="content"></a>
<?php
		include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';	
		$ans = getcontent("content","page = 'home'");
		$count = getcount("content","page = 'home'");
		for ($i =0;$i<$count;$i++)
		{
			if($ans[$i]['title']=='') echo ""; 
			else echo "<h2 class=\"bold\">".$ans[$i]['title']."</h2>";
			
			if($ans[$i]['text']=='') echo ""; 
			else echo "<p>".$ans[$i]['text']."</p>";
			
			if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
			echo "<ul><li class=\"first padding\"><a href=\"../../home/ho_edit.php?id=".$ans[$i]['id']."\">Edit Item</a></li>
			<li class=\"prev padding\"><a href=\"../../home/ho_insert.php\">Insert New</a></li>
			<li class=\"next padding\"><a href=\"../../home/ho_delete.php?id=".$ans[$i]['id']."\">Delete</a></li></ul>";
		}
		if($count==0) 
		{
			if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) echo "<ul><li class=\"prev padding\"><a href=\"../../home/ho_insert.php\">Insert New</a></li></ul>";
		}
					
?>			
</div>
<?php		
		$news=1;
		include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
		
?>
</div>
</body>
</html>