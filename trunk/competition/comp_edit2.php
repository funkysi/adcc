<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';

	$title=" - Update Competition Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php

	$id=$_POST['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	$type = $_POST['type'];
	$round = $_POST['round'];
	$judge = $_POST['judge'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	if($round==0) $round=1;
	$date=$year."-".$month."-".$day." 00:00:00";
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="UPDATE competition SET type='$type',  date='$date', round='$round', judge='$judge' WHERE id='$id'";
	if( false )
	{
	  
	}
	else
	{
		mysql_query($query);
		#$sub ="Competition Page details Updated by ". $auth;
		#$msg =$sub."\n\nText: ".$type;

		#include $_SERVER["DOCUMENT_ROOT"].'/include/email.php';
		header("Location:comp2.php" ); exit();

	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>