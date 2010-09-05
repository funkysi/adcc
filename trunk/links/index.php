<?php 
	$title=" - Links"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body>
<?php 
	$area="links";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
<h2 class="middle bold">Links Page</h2>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/db/dblinks.php';
	$ans = getlinks();
	$count = getcount();
	for ($i =0;$i<$count;$i++)
	{
				if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
				echo "<div class=\"item\">";
				echo "<p class=\"padding middle\"><a href=\"".$ans[$i]['link']."\">".$ans[$i]['linktext']."</a></p>
				<p class=\"middle\">".$ans[$i]['description']."</p>";
				if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
				echo "<ul class=\"padding middle\"><li class=\"float\"><a href=\"../../links/lin_insert.php\">Insert New Link</a></li>
				<li class=\"float\"><a href=\"../../links/lin_edit.php?id=".$ans[$i]['id']."\">Edit ".$ans[$i]['linktext']."</a></li>
				<li class=\"float\"><a href=\"../../links/lin_delete.php?id=".$ans[$i]['id']."\">Delete ".$ans[$i]['linktext']."</a></li></ul></div>";

	}
	if($count==0) 
	{
			if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) echo "<ul><li class=\"prev padding\"><a href=\"../../download/down_insert.php\">Insert New</a></li></ul>";
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
