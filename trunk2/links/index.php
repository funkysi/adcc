<?php 
	$title=" - Links"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body>
<?php 
	$area="links";
	$page="links";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
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
				if($perm==true ) 
				echo "<div class=\"item\">";
				echo "<p class=\"padding middle\"><a href=\"".$ans[$i]['link']."\">".$ans[$i]['linktext']."</a></p>
				<p class=\"middle\">".$ans[$i]['description']."</p>";
				if($perm==true) 
				echo "<ul class=\"middle\"><li class=\"padding float add\"><a href=\"../../links/lin_insert.php\">Insert New Link</a></li>
				<li class=\"padding float edit\"><a href=\"../../links/lin_edit.php?id=".$ans[$i]['id']."\">Edit ".$ans[$i]['linktext']."</a></li>
				<li class=\"padding float delete\"><a href=\"../../links/lin_delete.php?id=".$ans[$i]['id']."\">Delete ".$ans[$i]['linktext']."</a></li></ul></div>";

	}
	if($count==0) 
	{
			if($perm==true ) echo "<ul><li class=\"prev padding add\"><a href=\"../../download/down_insert.php\">Insert New</a></li></ul>";
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
