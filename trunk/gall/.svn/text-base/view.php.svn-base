<?php 
	$username = $_REQUEST['username'];
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	$ans = getuserbyusername($username);
	$title=" - ".$ans[0]['displayname']." ".$ans[0]['lastname']." Gallery"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';  
?>
<body>
<?php 
	$area="gall";
	$page="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	
	
	$pageNum = 1;
	$rowsPerPage = 8;
	if(isset($_GET['id']))
	{
	    $pageNum = $_GET['id'];
	}
	$offset = ($pageNum - 1); 
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';

	$numrows = getcountimagebyusername($username,$offset,$rowsPerPage);

	$st = ceil($numrows/$rowsPerPage);
	$maxPage = (($st-1)*$rowsPerPage)+1;
	$ans = getimagebyusername($username,$offset,$rowsPerPage);
	$ans2 = getuserbyusername($username);
	
	if ($pageNum > 1)
	{
	    $page = $pageNum - 8;
	    $prev = "<a href=\"../../../gall/$page/$username/\">Prev</a>";
	    $first = "<a href=\"../../../gall/1/$username/\">First&nbsp;Page</a>";
	}
	else
	{
	    $prev  = '';       
	    $first = ''; 
	}

	if ($pageNum < $maxPage)
	{
	    $page = $pageNum + 8;
	    $next = "<a href=\"../../../gall/$page/$username/\">Next</a>";
	    $last = "<a href=\"../../../gall/$maxPage/$username/\">Last&nbsp;Page</a>";
	}
	else
	{
	    $next = '';      
	    $last = ''; 
	}
	echo "<div class=\"left-content padding\"><a name=\"content\"></a>";
	#<span class=\"first firsticon\">".$first ."</span><span class=\"prev previcon\">". $prev ." </span> <span class=\"next nexticon\"> ". $next ."</span><span class=\"last lasticon\">". $last."</span><br/>";
echo "<table><tr><td width=\"150px\" class=\"firsticon\">".$first."</td><td width=\"150px\" class=\"previcon\">".$prev."</td><td width=\"150px\" class=\"nexticon\">".$next."</td><td width=\"150px\" class=\"lasticon\">".$last."</td></tr></table>";
	for ($i =0;$i<1;$i++) 
	{
		echo"<h2 class=\"bold middle\">".$ans2[$i]['displayname']." ".$ans2[$i]['lastname']."'s Gallery </h2>";
		if($ans2[$i]['about']!='') 
		echo "<p class=\"padding middle person\"><a href=\"../../../author/".$username."/\">About the Photographer</a></p>";
	}
	if($username==$auth) echo "<p class=\"padding middle edit\"><a href=\"../../../gall/all_gall_edit.php\">Edit your gallery</a></p>";
	echo "<p class=\"middle picture\"><a href=\"../../../gall/slideshowbyauthor.php?author=$username&status=1\">View Slide Show</a></p>";
	echo "<table class=\"padding middle\"><tr><td>";
	#loop through all records
	for ($i =0;$i<8;$i++)
	{
		if(isset($ans[$i]['id']))
		{
			echo "<p class=\"middle\"><a href=\"../../../image/".$username."/".$ans[$i]['id']."/\">
			<img  alt=\"".$ans[$i]['caption']."\" src=\"../../".str_replace('photos','250',$ans[$i]['image'])."\" /></a></p>
			<p class=\"bold middle\">".ucwords(strtolower($ans[$i]['caption']))."</p>";
			if($i==1 or $i==3 or $i==5) echo "</td></tr><tr><td>"; 
			if($i==0 or $i==2 or $i==4 or $i==6) echo "</td><td>";
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
