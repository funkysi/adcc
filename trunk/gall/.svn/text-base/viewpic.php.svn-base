<?php 
	$username = $_REQUEST['username'];
	$id = $_REQUEST['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';

	$ans = getimage($id);
	$title=" - ".$ans[0]['caption']; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';  
	$area="";
?>
<body>
<div>
<a name="content"></a>

<?php

	for ($i =0;$i<1;$i++) 
	{
		echo "<div><p class=\"bold middle padding\">".ucwords(strtolower($ans[$i]['caption']))."</p>";
		echo "<p class=\"middle\" ><img alt=\"".$ans[$i]['caption']."\" src=\"../../../".str_replace('photos','740',$ans[$i]['image'])."\" /></p>";
		echo "<p class=\"middle\">by <a href=\"../../../gall/1/".$username."/\">".$ans[$i]['displayname']." ".$ans[$i]['lastname'];
		echo "</a></p>";
		if($ans[$i]['info']!='') echo "<p class=\"middle padding\">".$ans[$i]['info']."</p>";
		echo "<p class=\"middle padding\">Viewed ".$ans[$i]['count']." times</p>";
		$count = $ans[$i]['count'] + 1;
		
		viewimage($id,$count);
	}
	echo "</div><div class=\"padding previcon middle\"><a href=\"javascript:history.back(1)\">Back</a></div>";
?>
</div>
<?php 
	$nomenu="1";
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</body>
</html>
