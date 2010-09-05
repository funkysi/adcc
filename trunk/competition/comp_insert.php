<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';

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
<h2 class="middle bold">Add New Competition Round</h2>
<?php
	$self = $_SERVER['PHP_SELF'];
	$other = $_SERVER['REMOTE_ADDR'];
	$exists=null;
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}
	if(isset($_POST['round']))
	{
		$round = $_POST['round'];
	}
	if(isset($_POST['judge']))
	{
		$judge = $_POST['judge'];
	}
	$nowy=date("Y");
	$now=date("m");
	$nowm=date("F");
	$nowd=date("d");
	if(isset($_POST['date']))
	{
		$date = $_POST['date'];
	}
	if(isset($_POST['year']))
	{
		$year=$_POST['year'];
	}
	if(isset($_POST['month']))
	{
		$month=$_POST['month'];
	}
	if(isset($_POST['day']))
	{
		$day=$_POST['day'];
	}
	if(isset($_POST['pword']))
	{
		$pword = $_POST['pword'];
	}
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit=null;
	#the html form
	$form = "<form action=\"$self\" method=\"post\" ><fieldset>";

	$form.= "<label for=\"type\">Type of Competition (Slide/Print): </label><INPUT TYPE=RADIO NAME=\"type\" VALUE=\"Intermediate Slide\">Intermediate Slide<br/>
	<label for=\"type\">&nbsp;</label><INPUT TYPE=RADIO NAME=\"type\" VALUE=\"Intermediate Print\">Intermediate Print<br/>
	<label for=\"type\">&nbsp;</label><INPUT TYPE=RADIO NAME=\"type\" VALUE=\"Advanced Slide\">Advanced Slide<br/>
	<label for=\"type\">&nbsp;</label><INPUT TYPE=RADIO NAME=\"type\" VALUE=\"Advanced Print\">Advanced Print<br/>";

	$form.= "<label for=\"round\">Which Round: </label><INPUT checked=\"checked\" TYPE=RADIO NAME=\"round\" VALUE=\"1\">1<br/>
	<label for=\"round\">&nbsp;</label><INPUT TYPE=RADIO NAME=\"round\" VALUE=\"2\">2<br/>
	<label for=\"round\">&nbsp;</label><INPUT TYPE=RADIO NAME=\"round\" VALUE=\"3\">3<br/>
	<label for=\"round\">&nbsp;</label><INPUT TYPE=RADIO NAME=\"round\" VALUE=\"4\">4<br/>";
	$form.= "<label for=\"judge\">Judge: </label><input id=\"judge\" type=\"text\" name=\"judge\" size=\"35\" />";
	$form.= "<br/> ";
	$form.= "<label for=\"day\">Date:</label> ";
	$form.= "";
	$form.="<select id=\"day\" name=\"day\">
	<option value=\"$nowd\" selected=\"selected\">$nowd</option>
	<option value=\"01\" >01</option>
	<option value=\"02\" >02</option>
	<option value=\"03\" >03</option>
	<option value=\"04\" >04</option>
	<option value=\"05\" >05</option>
	<option value=\"06\" >06</option>
	<option value=\"07\" >07</option>
	<option value=\"08\" >08</option>
	<option value=\"09\" >09</option>
	<option value=\"10\" >10</option>
	<option value=\"11\" >11</option>
	<option value=\"12\" >12</option>
	<option value=\"13\" >13</option>
	<option value=\"14\" >14</option>
	<option value=\"15\" >15</option>
	<option value=\"16\" >16</option>
	<option value=\"17\" >17</option>
	<option value=\"18\" >18</option>
	<option value=\"19\" >19</option>
	<option value=\"20\" >20</option>
	<option value=\"21\" >21</option>
	<option value=\"22\" >22</option>
	<option value=\"23\" >23</option>
	<option value=\"24\" >24</option>
	<option value=\"25\" >25</option>
	<option value=\"26\" >26</option>
	<option value=\"27\" >27</option>
	<option value=\"28\" >28</option>
	<option value=\"29\" >29</option>
	<option value=\"30\" >30</option>
	<option value=\"31\" >31</option>
	</select><select name=\"month\">
	<option value=\"$now\" >$nowm</option>
	<option value=\"01\" >January</option>
	<option value=\"02\" >February</option>
	<option value=\"03\" >March</option>
	<option value=\"04\" >April</option>
	<option value=\"05\" >May</option>
	<option value=\"06\" >June</option>
	<option value=\"07\" >July</option>
	<option value=\"08\" >August</option>
	<option value=\"09\" >September</option>
	<option value=\"10\" >October</option>
	<option value=\"11\" >November</option>
	<option value=\"12\" >December</option>
	</select><input size =\"5\" type=\"text\" name=\"year\" value=\"$nowy\" />";
	$form.= "<br/>";
	$form.= "<label>&nbsp;</label><input type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";

	#on first opening display the form
	if( !$submit)
	{ 
		$msg = $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !$type ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<b>Please complete all fields</b>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
 
		#connect to MySQL
		//include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';   

		$date=$year."-".$month."-".$day." 00:00:00";
	$sql = "select * from competition order by id";

	#execute the query
	$rs = @mysql_query( $sql ) 
			or die( "Could not execute SQL query" );

	#loop through all records
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
 
		$old=$row['type']." Round ".$row['round'];
		if($old==$type." ".$year." Round ".$round) $exists=true;
		}
		#create the SQL query
		if($type and !$exists)
		{
			$sql = "insert into competition (type,round, judge,date) 
			values (\"$type \" \"$year\",\"$round\",\"$judge\",\"$date\")"; 
			$rs = mysql_query($sql) 
			or die ("Could not execute SQL query");
			$sub ="New entry on Competition page added by ". $auth;
			$msg =$sub."\n\nText: ".$type;

			//include $_SERVER["DOCUMENT_ROOT"].'/include/email.php';
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{

			header("Location:comp2.php" ); exit();
		}
	}
	echo($msg);
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>