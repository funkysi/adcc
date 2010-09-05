<?php 
	$title=" - Gallery Search"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="gall";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
	echo "<div class=\"left-content padding\">";
	echo "<a name=\"content\"></a><h2 class=\"bold middle\">Search the Members Gallery</h2>";
	#connect to MySQL
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$self = $_SERVER['PHP_SELF'];
	if(isset($_GET['search']))
	{
		$search=$_GET['search'];
	}
	else $search="";
	if(isset($_POST['search']))
	{
		$search = $_POST['search'];
	}
	if(isset($_GET['result']))
	{
		$result = true;
	}
	if(isset($_COOKIE['auth_new']))  
	{
		$auth = $_COOKIE['auth_new'];
	}
	else $auth = "";
	if(isset($_POST['submit']))
	{
		$submit=$_POST['submit'];
	}
	else $submit="";
	$date=date("Y-m-d H:i:s");

	echo"<p>Please type in key words to search the gallery, please bear in mind that only image title and descriptions and the authors names are currently indexed in this search.</p>";
	echo "<form class=\"big\" action=\"$self?search=$search&result=true\" method=\"post\">
	<p class=\"middle\">
	<input value=\"$search\" type=\"text\" name=\"search\" />
	<input type=\"submit\" name=\"submit\" value=\"Search\" />
</p></form>";

	if($submit) 
	{	
		
		$result=true;
		header("Location:gall_search.php?search=$search&result=true");
		
	}
	if(isset($result))
	{
		
		
		#create the SQL query
		$query   = "SELECT COUNT(distinct(image_store.id)) AS numrows from imageJtag 
		join tags on tags.id = imageJtag.tag
		right join image_store on image_store.id = imageJtag.image  
		where caption like '%$search%' 
		or info like '%$search%' 
		or name like '%$search%'
		or tags.tag like '%$search%'";
		$result  = mysql_query($query) or die('Error, query failed');
		$row     = mysql_fetch_array($result, MYSQL_ASSOC);
		$numrows = $row['numrows'];

		$sql = "select distinct(image_store.id),image_store.* from imageJtag 
		join tags on tags.id = imageJtag.tag
		right join image_store on image_store.id = imageJtag.image  
		where caption like '%$search%' 
		or info like '%$search%' 
		or name like '%$search%'
		or tags.tag like '%$search%'
		order by date desc";

		#execute the query
		$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );

		echo "<div class=\"left-content padding\">";

		echo "<p class=\"middle\">".$numrows." Pictures Found from search \"".$search."\"</p>";

		echo "<table class=\"padding middle\"><tr><td class=\"middle\">";
		$i=0;
		#loop through all records
		while ( $row = mysql_fetch_array( $rs ) )
		{
			$j=$i%2;
			echo "<a href=\"../../../image/".$row['author_id']."/".$row['id']."/\"><img alt=\"".$row['image']."\" src=\"".str_replace('photos','250',$row['image'])."\" /></a><br/>".$row['caption']." <br/>by <a href=\"../../../gall/1/".$row['author_id']."/\">".$row['name']."</a>";
			if($j==1 ) echo "</td></tr><tr><td class=\"middle\">"; 
			if($j==0 ) echo "</td><td class=\"middle\">";
			$i++;
		}
		echo "</td></tr></table></div>";
		if($numrows>10) echo "<p class=\"middle\"><a href=\"#content\">Top</a></p>";
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("search",$auth,$search);
		
	}

?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>