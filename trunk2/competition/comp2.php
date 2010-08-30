<?php 

	$title=" - Competition League"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="competition";
	$page="competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Edit Competitions</h2>
<?php
	#connect to MySQL
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	#create the SQL query
	$query   = "SELECT COUNT(*) AS numrows FROM competition";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];

	$sql = "select * from competition order by type,round";

	#execute the query
	$rs = @mysql_query( $sql ) 
			or die( "Could not execute SQL query" );

	#loop through all records
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
 
		echo "<p class=\"middle padding\">".$row['type']." Round ".$row['round']."</p>"; 
?>
<div class="comm middle">
	<span class="edit"><a href="comp_edit.php?id=<?php echo $row['id']; ?>">Edit</a></span>
	<span class="delete"><a href="comp_delete.php?id=<?php echo $row['id']; ?>">Delete</a></span>
</div><br/>
<?php } ?>
<div class="middle"><span class="add"><a href="comp_insert.php">Insert New</a></span>&nbsp;<span class="picture"><a href="index.php">View Competitions</a></span></div>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>