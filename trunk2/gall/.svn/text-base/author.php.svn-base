<?php
	$title=" - About the Photographer";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
<?php
include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	$username = $_REQUEST['username'];

	$ans = getuserbyusername($username);

	for ($i =0;$i<1;$i++)
	{
		$about=$ans[$i]['about'];
		$about=str_replace("\n","<br/>",$about);
		echo "<h2 class=\"bold middle\">About ".$ans[$i]['displayname']." ".$ans[$i]['lastname']." </h2>";
		#echo "<div class=\"middle previcon padding\"><a href=\"javascript:history.back(1)\">Back</a></div>";
		if ($ans[$i]['image']!="") echo "<div ><img class=\"about\" src=\"http://".$_SERVER["HTTP_HOST"]."/".str_replace('photos','250',$ans[$i]['image'])."\" alt=\"../../gall/250.php?".$ans[$i]['image']."\" /><p class=\"padding\">".$about."</p></div>";
		if ($ans[$i]['image']=="") echo "<div >".$about."</div>";
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
