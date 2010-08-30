<?php 

	$title=" - Update Location Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body >
<?php
	$area="location";
	$page="location";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	$id=$_POST['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
	<a name="content"></a>
	<h2 class="middle bold">Edit Map Page</h2>
<?php	
	if(isset($_POST['delimage']))
	{
		$delimage=$_POST['delimage'];
	}
	else $delimage=null;
	if(isset($_POST['text']))
	{
		$text = $_POST['text'];
	}
	else $text=null;
	$image = $_POST['image'];
	$unique_name = date("U").".jpg";

		if( $_FILES['image']['name'] == "" and $text=="" )
	{

		header("Location:loc_edit.php?id=$id");exit();
	}
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
	else if( $_FILES['image']['name'] == "" )
	{
		$query   = "SELECT COUNT(*) AS numrows FROM content where id='$id'";
		$result  = mysql_query($query) or die('Error, query failed');
		$row     = mysql_fetch_array($result, MYSQL_ASSOC);
		$numrows = $row['numrows'];

		$sql = "select * from content where id='$id' ";

		#execute the query
		$rs = @mysql_query( $sql ) 
		or die( "Could not execute SQL query.." );
		while ( $row = mysql_fetch_array( $rs ) ) 
		{
			$image = $row['image'];
		}
		if($delimage==true) $image=null;
			// if( $image == "" and $text=="" )
	// {
		
		// header("Location:loc_edit.php?id=$id");
	// }
	}

if(true)
{
		include $_SERVER["DOCUMENT_ROOT"].'/db/dbcontent.php';
		$ans = updatecontent($text,$image,null,$id);
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("editloc",$auth,$text);
		header("Location:index.php");
}
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>