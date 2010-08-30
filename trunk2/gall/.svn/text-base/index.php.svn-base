<?php 
	$title=" - Gallery"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="bold middle">Club Gallery </h2>
	<div class = "left">
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/gall/randpic.php';		
?>
</div>
<?php 
				include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
				include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';	
				include $_SERVER["DOCUMENT_ROOT"].'/db/dbimages.php';
				$ans = getcontent("content","page = 'gallery'","");
				$count = getcount("content","page = 'gallery'","");

				if($count > 0) 
				{
				if($ans['0']['title']=='') $hide ="hide"; else $hide ="";
				echo "<h2 class=\"bold ".$hide."\">".$ans['0']['title']."</h2>";
				if($ans['0']['text']=='') $hide ="hide"; else $hide ="";
				echo "<p class=\"height ".$hide."\">".$ans['0']['text']."</p>";
				}
				$ans= getallusers();
				$count = getusercount();
				if($count > 0) 
				{
				#include $_SERVER["DOCUMENT_ROOT"].'/gall/usercloud.php';
				echo "<ul class=\"access\">";
				echo "<li><a href=\"slideshow.php?image=0&amp;status=1\">Slide Show<br/><img src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."".str_replace('../imgs/photos','/imgs/100',rndimage())."\"></a></li>";
				echo "<li><a href=\"top10.php\">Top 10<br/><img src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."".str_replace('../imgs/photos','/imgs/100',rndimage())."\"></a></li>";
				echo "<li><a href=\"top10new.php\">New Images<br/><img src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."".str_replace('../imgs/photos','/imgs/100',rndimage())."\"></a></li>";

				for ($i =0;$i<$count;$i++) 
				{
					$im = getimagebyusername2($ans[$i]['username']);
					echo "<li><a href=\"1/".$ans[$i]['username']."/\">".$ans[$i]['displayname']."&nbsp;".$ans[$i]['lastname']."<br/><img src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."".str_replace('../imgs/photos','/imgs/100',$im[0]['image'])."\"></a></li>";
				}
				echo "</ul><hr class=\"padding\"/>";
				include $_SERVER["DOCUMENT_ROOT"].'/gall/tagcloud.php';
				}
				if($count > 0) 
				{
				$ans = getcontent("content","page = 'gallery'","limit 1,1");
				$count = getcount("content","page = 'gallery'","limit 1,1");
				if($ans[0]['title']=='') $hide ="hide"; else $hide ="";
				echo "<h2 class=\"bold ".$hide."\">".$ans[0]['title']."</h2>";
				if($ans[0]['text']=='') $hide ="hide"; else $hide ="";
				echo "<p class=\"".$hide."\">".$ans[0]['text']."</p>";
				$ans = getcontent("content","page = 'gallery'","limit 2,1");
				$count = getcount("content","page = 'gallery'","limit 2,1");
				if($ans[0]['title']=='') $hide ="hide"; else $hide ="";
				echo "<h2 class=\"bold red".$hide."\">".$ans[0]['title']."</h2>";
				if($ans[0]['text']=='') $hide ="hide"; else $hide ="";
				echo "<p class=\"".$hide."\">".$ans[0]['text']."</p>";
				}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>