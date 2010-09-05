<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';

	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
	}
	else $status=null;
	$id=$_GET['id'];
	if(isset($_GET['pid']))
	{
		$pid=$_GET['pid'];
	}
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query="SELECT * FROM content WHERE id='$id' or additional='$id' order by id asc";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	mysql_close();
	if($num==0) header("Location:index.php");
?>
<?php 
	$title=" - Edit News Page";
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
?>
<body>
<?php 
	$area="new";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit News</h2>
<?php
	$i=0;
	if($status=="toobig") 
	{
		echo "<p class=\"red\">Image was too large to upload. Please only upload files less than 2MB.</p>";
	}
	if($status=="jpg") 
	{
		echo "<p class=\"red\">Please only upload images in jpg format.</p>";
	}
	while ($i < $num) 
	{
		$text=mysql_result($result,$i,"text");
		$title=mysql_result($result,$i,"title");

		$date=mysql_result($result,$i,"date");
		$link=mysql_result($result,$i,"link");
		$image=mysql_result($result,$i,"image");
		$add=mysql_result($result,$i,"additional");
		$realid=mysql_result($result,$i,"id");

		$year = substr($date, 0, 4);
		$month = substr($date, 5,2);
		$day = substr($date, 8,2);
		$hour = substr($date, 11,2);
		$min = substr($date, 14,2);
		$sec = substr($date, 17,2);
		include $_SERVER["DOCUMENT_ROOT"].'/news/form.php';

		++$i;
	}
?>
<p class="middle">Add extra Image or text click <a href="extra.php?id=<?php echo $id; ?>">here</a>.</p>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>