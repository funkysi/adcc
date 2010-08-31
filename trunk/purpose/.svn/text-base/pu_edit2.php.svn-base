<?php 
	$title=" - Edit Our Purpose"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php 
	$area="purpose";
	$page="purpose";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
	if(isset($_POST['delimage']))
	{
		$delimage=$_POST['delimage'];
	}
	else $delimage=null;
	$id=$_POST['id'];
	if(isset($_POST['link']))
	{
		$link = $_POST['link'];
	}
	else $link="";
	$text = $_POST['text'];
	if(isset($_POST['image']))
	{
		$image = $_POST['image'];
	}
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$unique_name = date("U").".jpg";

	if( $_FILES['image']['name'] != "" )
	{
		copy ( $_FILES['image']['tmp_name'], 
		'../imgs/photos/' . $unique_name ) 
		or die( "Could not copy file" );
		$image = '../imgs/photos/' . $unique_name;
		include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
		image_resize(740,740,'740',$image);
		image_resize(100,100,'100',$image);
		image_resize(140,140,'140',$image);
		image_resize(250,250,'250',$image);
		image_resize(580,580,'580',$image);
	}
	else 
	{
		$query   = "SELECT COUNT(*) AS numrows FROM content where id='$id'";
		$result  = mysql_query($query) or die('Error, query failed');
		$row     = mysql_fetch_array($result, MYSQL_ASSOC);
		$numrows = $row['numrows'];

		$sql = "select * from content where id='$id' ";

		#execute the query
		$rs = @mysql_query( $sql ) 
		or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs ) ) 
		{
			$image = $row['image'];
		}
		if($delimage==true) $image=null;
	}
	if( !(true) )
	{
  
	}
	else
	{
		$query="UPDATE content SET image='$image', link='$link', text='$text' WHERE id='$id'";
		mysql_query($query);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("editpurpose",$auth,$text,$title);
header("Location:index.php");exit();
		
	}
 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>