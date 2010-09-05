<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';
?>
<?php 
	$title=" - Competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="competition";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
<a name="content"></a>
<h2 class="middle bold">Edit Competition Entry</h2>
<?php

	$id=$_GET['id'];
	$cid=$_GET['cid'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$sql = "select * from users where level = 1 order by lastname ";

	#execute the query
	$rs = @mysql_query( $sql ) 
		or die( "Could not execute SQL query" );
	$arr = array();$brr = array();
	$query = array();
	$j = 0;
	#loop through all records
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$arr[$j] = $row['username'];
		$brr[$j] = $row['displayname']." ".$row['lastname'];
		$j++;
	}
	$max = count($arr);

	$query=" SELECT * FROM entries WHERE id='$id'";
	$result=mysql_query($query);
	$num=mysql_numrows($result);

	$i=0;
	while ($i < $num) 
	{
		$image_title=mysql_result($result,$i,"image_title");
		$score=mysql_result($result,$i,"score");
		$users=mysql_result($result,$i,"users");
?>
<form action="entries_edit2.php?cid=<?php echo $cid; ?>" method="post">
	<fieldset>
		<label for="image_title">Image Title: </label>
		<input id="image_title" type="text" name="image_title" size="35" value="<?php echo $image_title; ?>" /><br/>
		<label for="users">Author: </label>
		<select name="users">
<?php
		for ($j = 0; $j < $max; $j++)
		{
			echo "<option value=\"".$arr[$j]."\"";
			if($arr[$j]==$users) echo "selected=\"selected\"";
			echo ">".$brr[$j]."</option>";
		}
?>
		</select><br/>
		<label for="score">Score: </label>
		<input id="score" type="text" name="score" size="35" value="<?php echo $score; ?>" /><br/>
		<label>&nbsp;</label>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
		<input type="submit" value="Update" />
	</fieldset>
</form>
<form action="entries_delete.php?id=<?php echo $id; ?>&cid=<?php echo $cid; ?>" method="post">
	<fieldset>
		<label>&nbsp;</label>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
		<input type="submit" value="Delete" />
	</fieldset>
</form>
<?php 
		++$i;
	} 
?>
<p class="middle"><a href="comp2.php">Edit Other Competitions</a><br/><a href="comp_edit.php?id=<?php echo $cid; ?>">Edit Current Competition</a></p>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>