<?php 
	$title=" - Download Area"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="download";
	$page="download";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
<h2 class="middle bold">Download Area </h2>

<?php

	include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';
	$ans = getdownload();
	$count = getcount();
	echo "<p class=\"padding middle\">The following files are available to download.</p>";
#loop through all records

	for ($i =0;$i<$count;$i++)
	{
		if($perm==true ) 
		echo "<div class=\"item\">";
		echo "<dl class=\"".substr($ans[$i]['disp'],-3)."\"><dt><a href=\"count.php?id=".$ans[$i]['ufile']."\">".str_replace('_',' ',$ans[$i]['disp'])."</a> &nbsp;&nbsp;(".filesize_format($ans[$i]['size']).")</dt><dd>".$ans[$i]['comment']."</dd></dl>"; 
		if($perm==true ) 
		echo "<ul class=\"middle\"><li class=\"float\">Viewed ".$ans[$i]['count']." times</li>
		<li class=\"float add padding\"><a href=\"../../download/down_insert.php\">Insert New File</a></li>
		<li class=\"float edit padding\"><a href=\"../../download/down_edit.php?id=".$ans[$i]['id']."\">Edit ".str_replace('_',' ',$ans[$i]['disp'])."</a></li>
		<li class=\"float delete padding\"><a href=\"../../download/down_delete.php?id=".$ans[$i]['id']."&amp;ufile=".$ans[$i]['ufile']."\">Delete ".str_replace('_',' ',$ans[$i]['disp'])."</a></li></ul></div>";
	}
	if($count==0) 
	{
			if($perm==true ) echo "<ul><li class=\"prev add padding\"><a href=\"../../download/down_insert.php\">Insert New</a></li></ul>";
	}
?>
</div>
<?php 
include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>