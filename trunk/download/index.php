<?php 
	$title=" - Download Area"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="download";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
<h2 class="middle bold">Download Area </h2>

<?php

	include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';
	$ans = getdownload();
	$count = getcount();
	echo "<p class=\"padding\">The following files are available to download.</p>";
#loop through all records

	for ($i =0;$i<$count;$i++)
	{
		if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
		echo "<div class=\"item\">";
		echo "<dl class=\"\"><dt><a href=\"count.php?id=".$ans[$i]['ufile']."\">".$ans[$i]['disp']."</a> (".filesize_format($ans[$i]['size']).")</dt><dd>".$ans[$i]['comment']."</dd></dl>"; 
		if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
		echo "<ul class=\"padding middle\"><li class=\"float padding\">Viewed ".$ans[$i]['count']." times</li>
		<li class=\"float\"><a href=\"../../download/down_insert.php\">Insert New File</a></li>
		<li class=\"float\"><a href=\"../../download/down_edit.php?id=".$ans[$i]['id']."\">Edit ".$ans[$i]['disp']."</a></li>
		<li class=\"float\"><a href=\"../../download/down_delete.php?id=".$ans[$i]['id']."&amp;ufile=".$ans[$i]['ufile']."\">Delete ".$ans[$i]['disp']."</a></li></ul></div>";
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