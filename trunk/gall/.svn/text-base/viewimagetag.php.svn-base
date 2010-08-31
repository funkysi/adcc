<?php 
	$title=" - Tag Gallery";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>	  
<div class="left-content padding">
<a name="content"></a><h2 class="middle bold">Tag Gallery</h2>
<p class="padding">As well as viewing images by author you can now view images by theme or tag. All images can now be tagged by the author.</p>
<?php
	#connect to MySQL

	$type=$_GET['tag'];

	#create the SQL query

	include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';
	$ans = getimagebytag($type);
	$count = getcountimagebytag($type);


	echo "<table><tr><td>";
	#loop through all records
	for ($i =0;$i<$count;$i++)
	{
		$j=$i%2;
		echo "<p class=\"middle\"><a href=\"../../../image/".$ans[$i]['author_id']."/".$ans[$i]['realid']."/\"><img alt=\"Photo of ".$ans[$i]['caption']."\" src=\"../".str_replace('photos','250',$ans[$i]['realimage'])."\" /></a></p><p class=\"middle\">".$ans[$i]['caption']." </p><p class=\"middle\">by <a href=\"../../../gall/1/".$ans[$i]['author_id']."/\">".$ans[$i]['name']."</a></p>";
		if($j==1 ) echo "</td></tr><tr><td>"; 
		if($j==0 ) echo "</td><td>";
	}
	echo "</td></tr></table>";
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>