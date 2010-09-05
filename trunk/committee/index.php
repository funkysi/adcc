<?php 
	$title=" - Committee"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="contact";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>  	  
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php'; 
	$ans = getcommittee();
	$count = getcommcount();
?>
	<h2 class="bold middle">The Committee <?php echo date("Y"); ?></h2>
	<p class="padding">If you wish to contact us for more information about becoming a member, 
	or to comment on this site or anything to do with the club please email our <a href="mailto:<?php echo getconfig('email');?>">Webmaster</a>.</p>
	<?php 
	if($count==0) 
		{
			if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) echo "<ul><li class=\"prev padding\"><a href=\"../../committee/com_insert.php\">Insert New</a></li></ul>";
		}
		?>
	
	<table><tr >
<?php 
	#loop through all records
	$s=0;
	for ($i =0;$i<$count;$i++)
	{
		$odd="</tr><tr>";
		if(($s%2)=="0") $odd="";
		$s++;
?>
		<td class="bold middle"><?php echo $ans[$i]['role']; ?>: <br/>
<?php 
		echo "<a href=\"../../author/".$ans[$i]['username']."/\">".$ans[$i]['displayname']." ".$ans[$i]['lastname']."</a>"; 
?>  
<p>
<?php 
		echo "<img src=\"../".str_replace('photos','250',$ans[$i]['image'])."\" alt=\"".$ans[$i]['displayname']."\" />"; 
?>
</p>
<?php
		if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
			echo "<ul class=\"padding middle\"><li class=\"float\"><a href=\"com_insert.php\">Insert New Comittee Member</a></li>
			<li class=\"float\"><a href=\"com_edit.php?id=".$ans[$i]['id']."\">Edit ".$ans[$i]['displayname']." ".$ans[$i]['lastname']."</a></li>
			<li class=\"float\"><a href=\"com_delete.php?id=".$ans[$i]['id']."\">Delete ".$ans[$i]['displayname']." ".$ans[$i]['lastname']."</a></li></ul>";
?>
</td>
<?php 
	echo $odd; 
 
	}
	
?>
			<td></td>
		</tr>
	</table>
</div>
<?php
		
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>