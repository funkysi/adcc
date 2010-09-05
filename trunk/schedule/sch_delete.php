<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
 
	$title=" - Delete Meeting Schedule"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="schedule";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	$id=$_GET['id'];
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Delete Meeting Schedule Pages</h2>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$query="DELETE FROM schedule WHERE id='$id'";
	if( !(true) )
	{
  
	}
	else
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("delevent",$auth,$id);
		mysql_query($query);

header("Location:index.php");exit();
		mysql_close();
	}
	echo "</div>";
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>