<form enctype="multipart/form-data" action="<?php if($add=="0") echo "new_edit2.php"; else echo "new_edit3.php?id=".$realid;?>" method="post">
	<fieldset>
		<label for="text">Main Text: </label><textarea id="text<?php if($add=="0") echo "0" ?>" cols="50" rows="10" name="text" ><?php echo $text; ?></textarea>
		<?php if($image!="") {echo "<label>Image: </label><img alt=\"\" src=\"../".str_replace('photos','250',$image)."\" /><br/><label for=\"image\">Delete Image: </label><input id=\"delimage";
		if($add=="0") echo "0" ;echo "\" type=\"checkbox\" name=\"delimage\" /><br/>";}?>
		<label for="image">Image: </label><input id="image<?php if($add=="0") echo "0" ?>" size ="35" type="file" name="image" /><br/>
		<label for="caption">Image Caption: </label><input id="caption<?php if($add=="0") echo "0" ?>" size ="40" type="text" name="title" value="<?php echo $title; ?>"/><br/>
		<label for="link">Link Url:</label> <input id="link<?php if($add=="0") echo "0" ?>" size ="40" type="text" name="link" value="<?php echo $link; ?>"/><br/>
<?php 
		if($add=="0") 
		{
			echo "
			<label for=\"date\">Date:</label>
			<select id=\"day\" name=\"day\">
			<option value=\"01\"";if ($day==01) echo "selected=\"selected\"";echo ">01</option>
			<option value=\"02\" "; if ($day==02) echo "selected=\"selected\"";echo ">02</option>
			<option value=\"03\" "; if ($day==03) echo "selected=\"selected\"";echo ">03</option>
			<option value=\"04\" "; if ($day==04) echo "selected=\"selected\"";echo ">04</option>
			<option value=\"05\" "; if ($day==05) echo "selected=\"selected\"";echo ">05</option>
			<option value=\"06\" "; if ($day==06) echo "selected=\"selected\"";echo ">06</option>
			<option value=\"07\" "; if ($day==07) echo "selected=\"selected\"";echo ">07</option>
			<option value=\"08\" "; if ($day==08) echo "selected=\"selected\"";echo ">08</option>
			<option value=\"09\" "; if ($day==09) echo "selected=\"selected\"";echo ">09</option>
			<option value=\"10\" "; if ($day==10) echo "selected=\"selected\"";echo ">10</option>
			<option value=\"11\" "; if ($day==11) echo "selected=\"selected\"";echo ">11</option>
			<option value=\"12\" "; if ($day==12) echo "selected=\"selected\"";echo ">12</option>
			<option value=\"13\" "; if ($day==13) echo "selected=\"selected\"";echo ">13</option>
			<option value=\"14\" "; if ($day==14) echo "selected=\"selected\"";echo ">14</option>
			<option value=\"15\" "; if ($day==15) echo "selected=\"selected\"";echo ">15</option>
			<option value=\"16\" "; if ($day==16) echo "selected=\"selected\"";echo ">16</option>
			<option value=\"17\" "; if ($day==17) echo "selected=\"selected\"";echo ">17</option>
			<option value=\"18\" "; if ($day==18) echo "selected=\"selected\"";echo ">18</option>
			<option value=\"19\" "; if ($day==19) echo "selected=\"selected\"";echo ">19</option>
			<option value=\"20\" "; if ($day==20) echo "selected=\"selected\"";echo ">20</option>
			<option value=\"21\" "; if ($day==21) echo "selected=\"selected\"";echo ">21</option>
			<option value=\"22\" "; if ($day==22) echo "selected=\"selected\"";echo ">22</option>
			<option value=\"23\" "; if ($day==23) echo "selected=\"selected\"";echo ">23</option>
			<option value=\"24\" "; if ($day==24) echo "selected=\"selected\"";echo ">24</option>
			<option value=\"25\" "; if ($day==25) echo "selected=\"selected\"";echo ">25</option>
			<option value=\"26\" "; if ($day==26) echo "selected=\"selected\"";echo ">26</option>
			<option value=\"27\" "; if ($day==27) echo "selected=\"selected\"";echo ">27</option>
			<option value=\"28\" "; if ($day==28) echo "selected=\"selected\"";echo ">28</option>
			<option value=\"29\" "; if ($day==29) echo "selected=\"selected\"";echo ">29</option>
			<option value=\"30\" "; if ($day==30) echo "selected=\"selected\"";echo ">30</option>
			<option value=\"31\" "; if ($day==31) echo "selected=\"selected\"";echo ">31</option>
			</select>
			<select name=\"month\">
			<option value=\"01\" "; if ($month==01) echo "selected=\"selected\"";echo ">January</option>
			<option value=\"02\" "; if ($month==02) echo "selected=\"selected\"";echo ">February</option>
			<option value=\"03\" "; if ($month==03) echo "selected=\"selected\"";echo ">March</option>
			<option value=\"04\" "; if ($month==04) echo "selected=\"selected\"";echo ">April</option>
			<option value=\"05\" "; if ($month==05) echo "selected=\"selected\"";echo ">May</option>
			<option value=\"06\" "; if ($month==06) echo "selected=\"selected\"";echo ">June</option>
			<option value=\"07\" "; if ($month==07) echo "selected=\"selected\"";echo ">July</option>
			<option value=\"08\" "; if ($month=="08") echo "selected=\"selected\"";echo ">August</option>
			<option value=\"09\" "; if ($month=="09") echo "selected=\"selected\"";echo ">September</option>
			<option value=\"10\" "; if ($month==10) echo "selected=\"selected\"";echo ">October</option>
			<option value=\"11\" "; if ($month==11) echo "selected=\"selected\"";echo ">November</option>
			<option value=\"12\" "; if ($month==12) echo "selected=\"selected\"";echo ">December</option>
			</select>
			<input id=\"date\" size =\"5\" type=\"text\" name=\"year\" value=\"".$year."\" /><br/>"; 
		}
?>
		<input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<input type="hidden" name="image" value="<?php echo $image; ?>" />
		<input type="hidden" name="prevUrl" value="<?php echo $prevUrl; ?>" />
		<label>&nbsp;</label>
		<input id="update" type="submit" value="Update" />
	</fieldset>
</form>
<form action="new_delete.php?id=<?php echo $realid; ?>" method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<label>&nbsp;</label><input id="del" type="submit" value="Delete" />
	</fieldset>
</form>