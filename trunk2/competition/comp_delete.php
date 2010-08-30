<?php 
		$title=" - Delete Competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php

	$id=$_GET['id'];
	$page="competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$query2="DELETE FROM entries WHERE compid='$id'";
	$query="DELETE FROM competition WHERE id='$id'";
	#$query3="OPTIMIZE TABLE entries ";
	#$query4="OPTIMIZE TABLE competition ";
	if( false )
	{
	  
	}
	else
	{
		mysql_query($query);
		mysql_query($query2);
		//mysql_query($query3);
		//mysql_query($query4);
		$sub ="Competition details deleted by ". $auth;
		$msg =$sub."\n\n";

		#include $_SERVER["DOCUMENT_ROOT"].'/include/email.php';
		echo "<div class=\"middle\">Record Updated</div>";
		#echo "<div class=\"middle\"><a href=\"javascript:history.back(1)\">Back</a></div><br/>";
		header("Location:comp2.php" ); exit();
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>