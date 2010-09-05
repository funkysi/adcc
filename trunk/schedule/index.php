<?php 
	$title=" - Schedule"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body>
<?php 
	$area="schedule";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
<?php
				$page=date("Y");
				if(isset($_GET['id']))
				{
			    	$page = $_GET['id'];
				}
				include $_SERVER["DOCUMENT_ROOT"].'/db/dbschedule.php';	
				$max = maxdate();
				$min = mindate();
				$now = date("Y");
				if ($page<$min) $page=$min;
				if ($page>$max) $page=$max;
				if ($page > $min)
				{  
					$pageN = $page -1;
				    $prev = "[<a href=\"/schedule/$pageN/\">Go to ".($page-1)."</a>]";
				    
				} 
				else
				{
					$prev  = ' ';       
				     
				}
				if ($page < $max)
				{
					$pageN = $page + 1;
					$next = "[<a href=\"/schedule/$pageN/\">Go to ".($page+1)."</a>]";
				} 
				else
				{
					$next = '&nbsp;';     
					
				}
				echo "<h2 class=\"middle bold padding\">Programme ".$page."</h2>";
				echo "<span class=\"first\">".$prev."</span><span class=\"last\">".$next."</span>";
				echo "<p class=\"black bold padding\">For last minute changes to our meeting schedule please call 07964 248369 to hear a recorded message. </p>";
				$ans = getschedule($page);
				$count = countschedule($page);
				echo "<table>";
				for ($i =0;$i<$count;$i++)
				{
					$year = substr($ans[$i]['date'], 0, 4);
					$month = substr($ans[$i]['date'],5,2);
					$day = substr($ans[$i]['date'], 8,2);
					$hour = substr($ans[$i]['date'], 11,2);
					$min = substr($ans[$i]['date'], 14,2);
					$sec = substr($ans[$i]['date'], 17,2);
					$orgdate=date("l dS F ", mktime($hour,$min,$sec,$month,$day,$year));
					$orgday=substr($orgdate, 0,9);
					$orgmonth=substr($orgdate,9,12);
					$orgd=substr($orgdate, 21,20);
					echo "<tr><td class=\"red bold\"><a name=\"".$ans[$i]['id']."\"></a>".$orgdate."</td><td class=\"sch bold\">".$ans[$i]['event']."</td></tr>"; 
					if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and ($_COOKIE['level_new']==0 or $_COOKIE['level_new']==2)) 
					echo "<tr><td><a href=\"../../schedule/sch_edit.php?id=".$ans[$i]['id']."\"> Edit Item </a><a href=\"../../schedule/sch_insert.php\"> Insert New </a><a href=\"../../schedule/sch_delete.php?id=".$ans[$i]['id']."\"> Delete </a></td>";
					else echo "<tr><td></td>";
					if ($ans[$i]['misc']!="") echo "<td class=\"black bold\">". $ans[$i]['misc']."</td></tr>"; 
					else if ($ans[$i]['misc']=="") echo "<td></td></tr>";
					
				}
echo "</table>";				
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>