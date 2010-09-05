<?php  
	$title=" - Site Usage Report"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
	require_once '../include/getcookie.php';
?>
<body>
<?php 
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Site Usage Report</h2>
	<p class="middle"><a href="analytics_report.php">Page 2</a></p>
<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbdownload.php';		
	$sql = "SELECT DISTINCT (name) FROM image_store order by name";
	$i=0;
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$user[$i]=$row['name'];
		$i++;
	}
	if(!isset($totalcount)) $totalcount=0;
	if(!isset($sitetotal)) $sitetotal=0;
	echo "<table>";
	for($j=0;$j<$i;$j++)
	{
		$sql2 = "select * from image_store where name='$user[$j]'";
		$count=0;
		$total=0;
		$total100=0;
		$total140=0;
		$total250=0;
		$total580=0;
		$total740=0;
	
		#execute the query
		$rs = @mysql_query( $sql2 ) or die( $sql2."Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs ) ) 
		{
			#$image=$row['image'];
			$image_100=str_replace('photos','100',$row['image']);
			$image_140=str_replace('photos','140',$row['image']);
			$image_250=str_replace('photos','250',$row['image']);
			$image_580=str_replace('photos','580',$row['image']);
			$image_740=str_replace('photos','740',$row['image']);
			#$file = fopen($image, "r");
			#$imagesize = filesize($image);
			#fclose($file);
			$file = fopen($image_100, "r");
			$image100size = filesize($image_100);
			fclose($file);
			$file = fopen($image_140, "r");
			$image140size = filesize($image_140);
			fclose($file);
			$file = fopen($image_250, "r");
			$image250size = filesize($image_250);
			fclose($file);
			$file = fopen($image_580, "r");
			$image580size = filesize($image_580);
			fclose($file);
			$file = fopen($image_740, "r");
			$image740size = filesize($image_740);
			fclose($file);
			#echo "<tr><td><img src=\"$image_100\"></td><td>".filesize_format($imagesize)."</td><td>".filesize_format($image100size)."</td><td>".filesize_format($image140size)."</td><td>".filesize_format($image250size)."</td><td>".filesize_format($image580size)."</td><td>".filesize_format($image740size)."</td></tr>";
			$total+=$imagesize;
			$total100+=$image100size;
			$total140+=$image140size;
			$total250+=$image250size;
			$total580+=$image580size;
			$total740+=$image740size;
			$count++;
			$counts[$j]=$count;
		}
		$grandtotal[$j]=$total+$total100+$total140+$total250+$total580+$total740;
		#echo "<tr><td>".filesize_format($total)."</td><td>".filesize_format($total100)."</td><td>".filesize_format($total140)."</td><td>".filesize_format($total250)."</td><td>".filesize_format($total580)."</td><td>".filesize_format($total740)."</td></tr>";
		$sitetotal+=$grandtotal[$j];
		$totalcount+=$count;
	}
	echo "<tr><th>Username</th><th>No of images</th><th>Disk Usage</th></tr>";

	for($j=0;$j<$i;$j++)
	{
	echo "<tr><td>".$user[$j]."</td><td>".$counts[$j]."</td><td>".filesize_format($grandtotal[$j])."</td></tr>";
}
	echo "<tr><th>Total</th><th>".$totalcount."</th><th>".filesize_format($sitetotal)."</th></tr>";

	echo "</table><p class=\"middle\">";
	include_once $_SERVER["DOCUMENT_ROOT"].'/charts/php-ofc-library/open_flash_chart_object.php';
	open_flash_chart_object( 300, 300, 'http://'. $_SERVER['SERVER_NAME'] .'/charts/images.php',false,'http://'. $_SERVER['SERVER_NAME'].'/charts/' );
open_flash_chart_object( 600, 300, 'http://'. $_SERVER['SERVER_NAME'] .'/charts/uploadspermonth.php',false,'http://'. $_SERVER['SERVER_NAME'].'/charts/' );

?></p>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>