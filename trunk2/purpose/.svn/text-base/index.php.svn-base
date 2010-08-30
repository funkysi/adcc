<?php 
	$title=" - Our Purpose"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="purpose";
	$page="purpose";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Our Purpose</h2>
<?php
				include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';	
				$ans = getcontent("content","page = 'purpose'");
				$count = getcount("content","page = 'purpose'");
				for ($i =0;$i<$count;$i++)
				{
					srand(microtime()*1000000);
					$num=rand(1,2);
					if($ans[$i]['text']=='' or $ans[$i]['image']!=null) 
					echo "" ;
					else echo "<p class=\"padding\">".$ans[$i]['text']."</p>";
					
					if($ans[$i]['image']!=null)
					{
						if ($num==1) echo "<a href=\"".$ans[$i]['link']."\"><img class=\"left\" alt=\"Photo\" src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."".str_replace('../imgs/photos','/imgs/250',$ans[$i]['image'])."\" /></a><p class=\"big-padding\">".$ans[$i]['text']."</p><hr/>";
						else if ($num==2) echo "<a href=\"".$ans[$i]['link']."\"><img class=\"right\" alt=\"Photo\" src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."".str_replace('../imgs/photos','/imgs/250',$ans[$i]['image'])."\" /></a><p class=\"big-padding\">".$ans[$i]['text']."</p><hr/>";
					}
					if($perm==true ) echo "<ul><li class=\"first padding edit\"><a href=\"../../purpose/pu_edit.php?id=".$ans[$i]['id']."\">Edit Item</a></li><li class=\"prev padding add\"><a href=\"../../purpose/pu_insert.php\">Insert New</a></li><li class=\"next padding delete\"><a href=\"../../purpose/pu_delete.php?id=".$ans[$i]['id']."\">Delete</a></li></ul>";
				}
				if($count==0) 
				{
					if($perm==true ) echo "<ul><li class=\"prev padding add\"><a href=\"../../purpose/pu_insert.php\">Insert New</a></li></ul>";
				}
?>
</div>
		<?php 
			include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
		?>
		</div>
	</body>
</html>