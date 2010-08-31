<?php
	$self = $_SERVER['PHP_SELF'];

	if(!isset($_POST['submit']))  
	{
		$submit = null;
	}
	else $submit=$_POST['submit'];
	if(!isset($_POST['search']))  
	{
		$search = null;
	}
	else $search=$_POST['search'];
	echo "<div class=\"search\"><form action=\"http://".$_SERVER['HTTP_HOST']."/gall/gall_search.php?search=$search&amp;result=true\" method=\"post\"><p class=\"padding\"><input value=\"$search\" id=\"search\" type=\"text\" name=\"search\" /><br/><input type=\"submit\" class=\"butt search\" name=\"submit\" value=\"Search Gallery\" /></p></form>";
?>
