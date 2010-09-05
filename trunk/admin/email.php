<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$title=" - Edit Email Alerts"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding"><a name="content"></a>
	<h2 class="middle bold">Edit Email Alerts</h2>
	<p>Emails are currently sent to me and the following email addresses: 
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$self = $_SERVER['PHP_SELF'];
	$filter = $_POST['filter'];

	$sql2 = "select * from config where name='email'";
	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs2 ) ) 
	{
		$to=$row['setting'];
		echo $to;
?>
</p>
<p>To change the people who get emailed when this site is updated, complete the following form. Mutiple email addresses are allowed separated by commas.</p>
<br/>
<form action="email2.php" method="post">
	<fieldset>
		<label for="email">Email Address:</label>
		<input id="email" name="email" type="text" value="<?php echo $row['setting']; ?>" /><br/>
		<label>&nbsp;</label>
		<input type="submit" id="submit" value="Change" /><br/>
	</fieldset>
</form>
<?php 
	} 
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>