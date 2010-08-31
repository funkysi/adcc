<?php
	#include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$page="delusers";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	$self = $_SERVER['PHP_SELF'];
	$date = date("Y-m-d H:i:s");
	
	if(isset($_POST['submit']))
	{	
		$submit = $_POST['submit'];
	}
	else $submit=null;
	
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}
	
	if(isset($_GET['type']))
	{
		$type = $_GET['type'];
	}
	?>
<script type="text/javascript">

<!--

function validate_form ( )
{
	document.deluser.submit.disabled = false;
	valid = true;

        if ( document.deluser.type.value == "" )
        {
                document.deluser.submit.disabled = true;
                valid = false;
        }
        if ( document.deluser.type.value == "<?php echo $auth; ?>" )
        {
                document.deluser.submit.disabled = true;
                valid = false;
        }
        return valid;
}

//-->
</script>
<?php
	if($submit==null )
	{
		$title=" - Delete User Accounts"; 
		include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
		echo "<body onload=\"return validate_form ( );\">";
		$area="members";
		include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
		include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
		echo "<div class=\"left-content padding\"><h2 class=\"middle bold\">Delete User Accounts </h2>";
 
		$numrows = getallusercount();

		$ans= getall_users();

		$arr = array();
		$query = array();
		$j = 0;
		#loop through all records
		for ($i =0;$i<$numrows;$i++) 
		{
			$arr[$j] = $ans[$i]['username'];
			$brr[$j] = $ans[$i]['displayname']." ".$ans[$i]['lastname'];
			$j++;
		}
	
		$max = count($arr);
	
		echo "<div class=\"middle\"><form name=\"deluser\" action=\"$self\" method=\"post\" onchange=\"return validate_form ( );\"><fieldset><select name=\"type\">";
		echo "<option value=\"\" >Select User</option>";
		for ($j = 0; $j < $max; $j++)
		{
			echo "<option value=\"".$arr[$j]."\" >".$brr[$j]."</option>";
		}
		echo "</select><br/><input id=\"del\" type=\"submit\" name=\"submit\" value=\"Delete\" /> </fieldset></form><br/>";
		echo "<p>Warning this will completely removed all data stored in the users database. This action can not be undone.</p></div>";
	}
	else 
	{
		include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php'; 
		include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
		sendemail("deleteuser",$auth,$type);
		$query3="delete from image_store where author_id='$type'";
		$result=mysql_query($query3);
		$query2="delete from users where username='$type'";
		$result2=mysql_query($query2);
		
		if($submit) 
		{

		}

		header("Location:users_edit.php" );exit();	
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
