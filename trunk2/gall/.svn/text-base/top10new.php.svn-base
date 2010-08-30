<?php 
	$title=" - Gallery"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';  
?>
<body>
<?php 
	$area="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	#$username = $_REQUEST['username'];
	$pageNum = 1;
	$rowsPerPage = 10;
	if(isset($_GET['id']))
	{
	    $pageNum = $_GET['id'];
	}
	$offset = ($pageNum - 1); 
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';


	$ans = gettop10recentimage();

	
	
	echo "<div class=\"left-content padding\"><a name=\"content\"></a>";


		echo"<h2 class=\"bold middle\">Top 10 New Images</h2>";
		

	
	echo "<table class=\"padding middle\"><tr><td>";
	#loop through all records
	for ($i =0;$i<10;$i++)
	{
		if(isset($ans[$i]['id']))
		{
			echo "<p class=\"bold middle\">".($i+1)."</p>";
			echo "<p class=\"middle\"><a href=\"../../../image/".$ans[$i]['author_id']."/".$ans[$i]['id']."/\">
			<img  alt=\"".$ans[$i]['caption']."\" src=\"../../".str_replace('photos','250',$ans[$i]['image'])."\" /></a></p>
			<p class=\"middle\">".ucwords(strtolower($ans[$i]['caption']))."<br/>by <a href=\"../../../gall/1/".$ans[$i]['author_id']."/\">".$ans[$i]['name']."</a></p>";
			if($i==1 or $i==3 or $i==5 or $i==7) echo "</td></tr><tr><td>"; 
			if($i==0 or $i==2 or $i==4 or $i==6 or $i==8) echo "</td><td>";
		}
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
