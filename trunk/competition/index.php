<?php 
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
     
<?php

	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	#create the SQL query
	$query   = "SELECT COUNT(*) AS numrows FROM competition";
	$result  = mysql_query($query) or die('Error, query failed');
	$row     = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];

	$sql = "select count(*), id,type from competition group by type ";

	#execute the query
	$rs = @mysql_query( $sql ) 
			or die( "Could not execute SQL query" );
	$arr = array();
	$brr = array();
	$query = array();
	$j = 0;
	#loop through all records
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$arr[$j] = $row['type'];

		$j++;
	}
	$self = $_SERVER['PHP_SELF'];
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}
	else $type=null;

	$max = count($arr);
	if(isset($_GET['type']))
	{
	    $type = $_GET['type'];
	}
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit=null;
	if(isset($_GET['type']))
	{
		header("Location:index.php?id=$type");
	}
	if($numrows==0) echo "<p class=\"middle\">No Competitions have been added yet.</p>";
	else
	{
		echo "<p class=\"middle\">Please select which competition you wish to view.</p><div class=\"middle\"><form action=\"$self\" method=\"post\"><fieldset>
		<select name=\"type\">";


		for ($j = 0; $j < $max; $j++)
		{
			echo "<option value=\"".$arr[$j]."\" >".$arr[$j]."</option>";
		}


		echo "</select><br/><input type=\"submit\" name=\"submit\" value=\"View\" /></fieldset></form></div>";
	}
	echo "<h2 class=\"middle bold\"> ".$type." </h2>";
	if(isset($_COOKIE['level_new']) and isset($_COOKIE['auth_new']) and $_COOKIE['level_new']==0 ) 
	{
		echo "<p class=\"middle\"><a href=\"comp2.php\">Edit Competitions</a></p><br/>";
	}
	echo "<table width=\"90%\">";

	$sql = "SELECT * FROM entries join competition on entries.compid = competition.id join users on entries.users = users.username where type='$type' order by round, score DESC";
	$rs = @mysql_query( $sql ) 
			or die( "Could not execute SQL query" );
	$j=0;	
	$s=0;	
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$odd="null";
		if(($s%2)=="0") $odd="odd";
		$s++;
		$datetime=$row["date"];
		$year = substr($datetime, 0, 4);
		$month = substr($datetime,5,2);
		$day = substr($datetime, 8,2);
		$hour = substr($datetime, 11,2);
		$min = substr($datetime, 14,2);
		$sec = substr($datetime, 17,2);
		$orgdate=date("l dS F ", mktime($hour,$min,$sec,$month,$day,$year));

		if($j!=$row['round']) 
			{ 
				echo "<tr>
				<td colspan=\"3\">Round ".$row['round']." of the ".$row['type']." took place on ".$orgdate." and was judged by ".$row['judge'].".</td></tr>";
				
				echo "<tr><td width=\"40%\">Title</td>
				<td width=\"40%\">Author</td>
				<td width=\"20%\">Score</td>
				</tr>";
				$j=$row['round'];
			}
		echo "<tr class=\"".$odd."\"><td>".$row['image_title']." </td><td>".$row['displayname']." ".$row['lastname']."</td><td>".$row['score']."  </td></tr>";	
	}
	echo "</table>";
	
	$sql = "SELECT sum(score) as count,displayname,lastname,users FROM entries join competition on entries.compid = competition.id join users on entries.users = users.username where type = '$type' group by users order by count DESC";
	$rs = @mysql_query( $sql ) 
			or die( "Could not execute SQL query" );
	$j=0;	
if($submit) 
		echo "<table width=\"90%\">
		<tr><td colspan=\"3\">&nbsp;</td></tr>
		<tr><td colspan=\"3\"><strong>Results So far...</strong></td></tr>
		
		<tr>
		<td width=\"75%\">Author</td>
		<td width=\"5%\">&nbsp;</td>
		<td width=\"20%\">Score</td>
		</tr>";
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$odd="null";
		if(($s%2)=="0") $odd="odd";
		$s++;
		echo "<tr class=\"".$odd."\"><td>".$row['displayname']." ".$row['lastname']."</td><td>&nbsp;</td><td>".$row['count']."</td></tr>";
	}
?>	
</table>

	</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>	
</body>
</html>
