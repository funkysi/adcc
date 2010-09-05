<?php 
	$title=" - Where We Are"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Where We Are</h2>

	      
	  <?php
				if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
				echo "<p class=\"padding middle\"><a href=\"createmapjs.php\">Advanced Map Settings</a></p>";
				include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';	
				$ans = getcontent("content","page = 'location'");
				$count = getcount("content","page = 'location'");
				for ($i =0;$i<$count;$i++)
				{
					if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
					echo "<div class=\"item\">";
					echo "<div class=\"padding\">".$ans[$i]['text']."</div>";
					if ($ans[$i]['image']!=null) echo "<img class=\"location\" alt=\"".$ans[$i]['image']."\" src=\"".$ans[$i]['image']."\" />";
					if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
					echo "<ul class=\"padding middle\"><li class=\"float\"><a href=\"../../location/loc_edit.php?id=".$ans[$i]['id']."\">Edit Item</a></li>
					<li class=\"float\"><a href=\"../../location/loc_insert.php\">Insert New</a></li>
					<li class=\"float\"><a href=\"../../location/loc_delete.php?id=".$ans[$i]['id']."\">Delete</a></li></ul></div>";
				}
				if($count==0) 
				{
					if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) echo "<ul><li class=\"prev padding\"><a href=\"../../location/loc_insert.php\">Insert New</a></li></ul>";
				}
				?>	
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>	
</body>
</html>