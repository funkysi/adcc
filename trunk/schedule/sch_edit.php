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
<div class="left-content padding"><a name="content"></a>
	<h2 class="middle bold">Edit Meeting Schedule Pages</h2>
<?php

	$id=$_GET['id'];
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

	$query=" SELECT * FROM schedule WHERE id='$id'";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	

	$i=0;
	while ($i < $num) 
	{
		$event=mysql_result($result,$i,"event");
		$misc=mysql_result($result,$i,"misc");
		$date=mysql_result($result,$i,"date");

		$year = substr($date, 0, 4);
		$month = substr($date,5,2);
		$day = substr($date, 8,2);
		$hour = substr($date, 11,2);
		$min = substr($date, 14,2);
		$sec = substr($date, 17,2);
?>
<form action="sch_edit2.php" method="post">
    <fieldset>     
		<label for="text">Event Text: </label>
		<input id="text" size ="40" type="text" name="event" value="<?php echo $event; ?>" /><br/>
		<label for="info">Additional Info: </label>
		<input id="info" size ="40" type="text" name="misc" value="<?php echo $misc; ?>" /><br/>
		<label id="date">Date:</label>
		<select name="day" id="day">
			<option value="01" <?php if ($day==01) echo "selected=\"selected\"";?>>01</option>
			<option value="02" <?php if ($day==02) echo "selected=\"selected\"";?>>02</option>
			<option value="03" <?php if ($day==03) echo "selected=\"selected\"";?>>03</option>
			<option value="04" <?php if ($day==04) echo "selected=\"selected\"";?>>04</option>
			<option value="05" <?php if ($day==05) echo "selected=\"selected\"";?>>05</option>
			<option value="06" <?php if ($day==06) echo "selected=\"selected\"";?>>06</option>
			<option value="07" <?php if ($day==07) echo "selected=\"selected\"";?>>07</option>
			<option value="08" <?php if ($day==08) echo "selected=\"selected\"";?>>08</option>
			<option value="09" <?php if ($day==09) echo "selected=\"selected\"";?>>09</option>
			<option value="10" <?php if ($day==10) echo "selected=\"selected\"";?>>10</option>
			<option value="11" <?php if ($day==11) echo "selected=\"selected\"";?>>11</option>
			<option value="12" <?php if ($day==12) echo "selected=\"selected\"";?>>12</option>
			<option value="13" <?php if ($day==13) echo "selected=\"selected\"";?>>13</option>
			<option value="14" <?php if ($day==14) echo "selected=\"selected\"";?>>14</option>
			<option value="15" <?php if ($day==15) echo "selected=\"selected\"";?>>15</option>
			<option value="16" <?php if ($day==16) echo "selected=\"selected\"";?>>16</option>
			<option value="17" <?php if ($day==17) echo "selected=\"selected\"";?>>17</option>
			<option value="18" <?php if ($day==18) echo "selected=\"selected\"";?>>18</option>
			<option value="19" <?php if ($day==19) echo "selected=\"selected\"";?>>19</option>
			<option value="20" <?php if ($day==20) echo "selected=\"selected\"";?>>20</option>
			<option value="21" <?php if ($day==21) echo "selected=\"selected\"";?>>21</option>
			<option value="22" <?php if ($day==22) echo "selected=\"selected\"";?>>22</option>
			<option value="23" <?php if ($day==23) echo "selected=\"selected\"";?>>23</option>
			<option value="24" <?php if ($day==24) echo "selected=\"selected\"";?>>24</option>
			<option value="25" <?php if ($day==25) echo "selected=\"selected\"";?>>25</option>
			<option value="26" <?php if ($day==26) echo "selected=\"selected\"";?>>26</option>
			<option value="27" <?php if ($day==27) echo "selected=\"selected\"";?>>27</option>
			<option value="28" <?php if ($day==28) echo "selected=\"selected\"";?>>28</option>
			<option value="29" <?php if ($day==29) echo "selected=\"selected\"";?>>29</option>
			<option value="30" <?php if ($day==30) echo "selected=\"selected\"";?>>30</option>
			<option value="31" <?php if ($day==31) echo "selected=\"selected\"";?>>31</option>
		</select>
		<select name="month">
			<option value="01" <?php if ($month==01) echo "selected=\"selected\"";?>>January</option>
			<option value="02" <?php if ($month==02) echo "selected=\"selected\"";?>>February</option>
			<option value="03" <?php if ($month==03) echo "selected=\"selected\"";?>>March</option>
			<option value="04" <?php if ($month==04) echo "selected=\"selected\"";?>>April</option>
			<option value="05" <?php if ($month==05) echo "selected=\"selected\"";?>>May</option>
			<option value="06" <?php if ($month==06) echo "selected=\"selected\"";?>>June</option>
			<option value="07" <?php if ($month==07) echo "selected=\"selected\"";?>>July</option>
			<option value="08" <?php if ($month==08) echo "selected=\"selected\"";?>>August</option>
			<option value="09" <?php if ($month=="09") echo "selected=\"selected\"";?>>September</option>
			<option value="10" <?php if ($month==10) echo "selected=\"selected\"";?>>October</option>
			<option value="11" <?php if ($month==11) echo "selected=\"selected\"";?>>November</option>
			<option value="12" <?php if ($month==12) echo "selected=\"selected\"";?>>December</option>
		</select>
		<input size ="5" type="text" name="year" value="<?php echo $year; ?>" /><br/>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input type="submit" value="Update" />
	</fieldset>
</form>
<form action="sch_delete.php?id=<?php echo $id; ?>" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<label>&nbsp;</label>
		<input type="submit" value="Delete" />
	</fieldset>
</form>
<?php
		++$i;
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>