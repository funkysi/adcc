<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
	$title=" - Competition League"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="competition";
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
 
		echo "<p class=\"middle\">".$row['type']." Round ".$row['round']."</p>"; 
?>
<ul class="comm middle">
	<li><a href="comp_edit.php?id=<?php echo $row['id']; ?>">Edit</a></li>
	<li><a href="comp_delete.php?id=<?php echo $row['id']; ?>">Delete</a></li>
</ul><br/>
<?php } ?>
<div class="middle"><a href="comp_insert.php">Insert New</a><br/><a href="index.php">View Competitions</a></div>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>