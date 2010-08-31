<script type="text/javascript">

<!--

function validate_form ( )
{
	document.permission.submit.disabled = false;
	valid = true;

        if ( document.permission.user.value == "" )
        {
                document.permission.submit.disabled = true;
                valid = false;
        }

        return valid;
}

//-->

</script>
<?php
	$title=" - Permissions";
	$area="members";
	$page="permission";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}	
	if(isset($_GET['user']))
	{
		$user = $_GET['user'];
	}	
	else $user=$auth;

	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body onload="return validate_form ( );">
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>

<?php
include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';

	$numrows = getallusercount();

	$ans= getall_users();

	$arr = array();
	$brr = array();
	
	$j = 0;
	#loop through all records
	for ($i =0;$i<$numrows;$i++) 
	{
		$arr[$j] = $ans[$i]['username'];
		$brr[$j] = $ans[$i]['displayname']." ".$ans[$i]['lastname'];
		$j++;
	}
	$self = $_SERVER['PHP_SELF'];
	if(isset($_POST['user']))
	{
		$user = $_POST['user'];
	}
	if(isset($_GET['user']))
	{
		$user = $_GET['user'];
	}
	else $type="";
	$max = count($arr);
	if(isset($_GET['user']))
	{
	    $user = $_GET['user'];
	}

	if(isset($_POST['submit']))
	{	
		$submit = $_POST['submit'];
	}
	if(isset($_REQUEST['go']))
	{
		header( "Location:permission.php?user=$user" ); exit();
	}
	echo "<div class=\"middle\"><form name=\"permission\" action=\"$self?go=true\" method=\"post\" onchange=\"return validate_form ( );\"><fieldset>
	<select name=\"user\">";
	echo "<option value=\"\" >Select User</option>";
	for ($j = 0; $j < $max; $j++)
	{
		echo "<option value=\"".$arr[$j]."\" >".$brr[$j]."</option>";
	}

	echo "</select><br/><input class=\"picture\" type=\"submit\" name=\"submit\" value=\"View\" /> </fieldset></form></div><br/>";

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	
	$sql = "select * from permission join users on permission.userid = users.username 
	join permission_pages on permission.location = permission_pages.page
	where users.username = '$user' order by permission.location";
	$result=mysql_query($sql);
	$num=mysql_numrows($result);
	$name=mysql_result($result,0,"displayname")." ".mysql_result($result,0,"lastname");
?>
<h2 class="middle bold">Edit <?php echo $name; ?>'s Permissions</h2>
<form>
	<fieldset>
		<table>
			<tr>
				<td width="100px"><strong>Location</strong></td>
				<td width="10px"><strong>Access</strong></td>
				<td width="100px"></td>
			</tr>
		</table>
	</fieldset>
</form>
<?php
	$i=0;
	while ($i < $num) 
	{
		$location_name=mysql_result($result,$i,"name");
		$location=mysql_result($result,$i,"location");
		$user=mysql_result($result,$i,"userid");
		$name=mysql_result($result,$i,"displayname")." ".mysql_result($result,$i,"lastname");
		$level=mysql_result($result,$i,"level");
?>
<form action="delpermission.php" method="post">
	<fieldset>
		<table>
			<tr>
				<td width="150px"><input type="hidden" name="user" value="<?php echo $user; ?>" /><?php echo $location_name;?><input type="hidden" name="location" value="<?php echo $location; ?>" /></td>
				<td width="10px"><?php echo $level;?></td>
				<td width="100px"><input id="del" type="submit" name="submit" value="Delete" /></td>
			</tr>
		</table>
	</fieldset>
</form>

<?php
		++$i;
	}
	$sql = "select * from permission_pages order by page";
	$result=mysql_query($sql);
	$num=mysql_numrows($result);
	$i=0;
?>
	<form action="addpermission.php" method="post">
		<fieldset>
			<table>
				<tr>
					<td width="100px"><input type="hidden" name="user" value="<?php echo $user; ?>" />
						<select name="page">
							<?php
								while ($i < $num) 
								{
									$newpage=mysql_result($result,$i,"page");
									$pagename=mysql_result($result,$i,"name");
							?>
							<option value="<?php echo $newpage;?>">
								<?php echo $pagename;?>
							</option>
							<?php
									++$i;
								}
							?>
						</select>
					</td>
					<td width="10px">1</td>
					<td width="100px"><input id="add" type="submit" name="submit" value="Add" /></td>
				</tr>
			</table>
		</fieldset>
	</form>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
