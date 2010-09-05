<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
 
	$title=" - Edit Meeting Schedule"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="schedule";
	$id=$_POST['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit Meeting Schedule Pages</h2>
<?php	
	$event=htmlspecialchars(strip_tags($_POST['event']));
	$misc=$_POST['misc'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$date=$year."-".$month."-".$day." 00:00:00";
	$sec=date("U", mktime(0,0,0,$month,$day,$year));
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE schedule SET event='$event', misc='$misc', date='$date', seconds='$sec' WHERE id='$id'";
	if( $event=="" )
	{
		header("Location:sch_edit.php?id=$id");exit();
	}
	else
	{
		mysql_query($query);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("editevent",$auth,$event,$misc,$date);
header("Location:index.php");exit();
		mysql_close();
	}
	echo "</div>";
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>