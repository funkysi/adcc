<?php 
	$title=" - Where We Are"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="location";
	$page="location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Where We Are</h2>

	      
	  <?php
				if($perm==true ) 
				echo "<p class=\"padding middle\"><a class=\"advanced\" href=\"createmapjs.php\">Advanced Map Settings</a></p>";
				include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';	
				$ans = getcontent("content","page = 'location'");
				$count = getcount("content","page = 'location'");
				for ($i =0;$i<$count;$i++)
				{
					if($perm==true ) 
					echo "<div class=\"item\">";
					if($ans[$i]['text']!="") echo "<div class=\"padding\">".$ans[$i]['text']."</div>";
					if ($ans[$i]['image']!=null) echo "<img class=\"location\" alt=\"".$ans[$i]['image']."\" src=\"".$ans[$i]['image']."\" />";
					if($perm==true ) 
					echo "<ul class=\"middle\"><li class=\"padding float edit\"><a href=\"../../location/loc_edit.php?id=".$ans[$i]['id']."\">Edit Item</a></li>
					<li class=\"padding float add\"><a href=\"../../location/loc_insert.php\">Insert New</a></li>
					<li class=\"padding float delete\"><a href=\"../../location/loc_delete.php?id=".$ans[$i]['id']."\">Delete</a></li></ul></div>";
				}
				if($count==0) 
				{
					if($perm==true ) echo "<ul><li class=\"prev add padding\"><a href=\"../../location/loc_insert.php\">Insert New</a></li></ul>";
				}
				?>	
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>	
</body>
</html>