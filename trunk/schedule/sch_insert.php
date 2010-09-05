<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie.php';

	$title=" - Edit Meeting Schedule"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php
	$area="schedule";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Edit Meeting Schedule Pages</h2>
<?php

	$self = $_SERVER['PHP_SELF'];
	$other = $_SERVER['REMOTE_ADDR'];
	
	
	if(isset($_POST['date']))
	{
		$date = $_POST['date'];
	}
	if(isset($_POST['event']))
	{
		$event = htmlspecialchars(strip_tags($_POST['event']));
	}
	if(isset($_POST['year']))
	{
		$year = $_POST['year'];
	}
	if(isset($_POST['month']))
	{
		$month = $_POST['month'];
	}
	if(isset($_POST['day']))
	{
		$day = $_POST['day'];
	}
	if(isset($_POST['misc']))
	{
		$misc = $_POST['misc'];
	}
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	else $submit="";
	$nowy=date("Y");
	$now=date("m");
	$nowm=date("F");
	$nowd=date("d");
	#the html form
	$form = "<form action=\"$self\" method=\"post\"><fieldset>";

	$form.= "<label for=\"etext\">Event Text: </label><input id=\"etext\" type=\"text\" name=\"event\" ";
	$form.= "size=\"40\" /><br/> ";
	$form.= "<label for=\"info\">Additional Info: </label><input id=\"info\" type=\"text\" name=\"misc\" ";
	$form.= "size=\"40\" /><br/> ";
	$form.= "<label id=\"date\">Date: </label>";
	$form.= "";
	$form.="<select name=\"day\" id=\"day\">
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
	</select><input size =\"5\" type=\"text\" name=\"year\" value=\"$nowy\" /><br/>";
	$form.= "";
	$form.= "<label>&nbsp;</label><input type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Add\" /> </fieldset></form>";

	#on first opening display the form
	if( !$submit)
	{ 
		$msg = $form; 
	}
	else 

	#redisplay a message and the form if incomplete
	if( !$event ) //setup with password if you want everyone to be able to leave messages remove: or !($pword=="missx") from this line
	{
		$msg = "<p class=\"middle red\">Please complete Event Text field.</p>";
		$msg.= $form;
	}
	else

	#add the form data to the guestbook database table
	{
		$date=$year."-".$month."-".$day." 00:00:00";
		$sec=date("U", mktime(0,0,0,$month,$day,$year)); 
		#connect to MySQL
		include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';   

		#create the SQL query
		if($event)
		{
			$sql = "insert into schedule (event,misc, date, seconds) 
			values (\"$event\",\"$misc\",\"$date\", \"$sec\")"; 
			$rs = mysql_query($sql) or die ("Could not execute SQL query");
		}

		#confirm the entry and display a link to view guestbook
		if($rs)
		{
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("newevent",$auth,$event,$misc,$date);
header("Location:index.php");exit();

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