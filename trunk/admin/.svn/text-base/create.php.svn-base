<?php
	#include $_SERVER["DOCUMENT_ROOT"].'/include/getcookie1.php';
	$page="createuser";
	include $_SERVER["DOCUMENT_ROOT"].'/include/auth.php';
	if($perm==false) 
	{
		header( "Location:../admin/index.php" ); exit();
	}
	$self = $_SERVER['PHP_SELF'];
	$date = date("Y-m-d H:i:s");
	
	if(isset($_POST['level']))
	{
		$level = $_POST['level'];
	}
	
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
	}
	else $username="";
	
	if(isset($_POST['lastname']))
	{
		$lastname = $_POST['lastname'];
	}
	
	if(isset($_POST['displayname']))
	{
		$displayname = $_POST['displayname'];
	}
	
	if(isset($_POST['passw']))
	{
		$passw = md5($_POST['passw']);
	}
	
	if(isset($_POST['submit']))
	{	
		$submit = $_POST['submit'];
	}
	
 	$form= "<p>Username must be unique and not contain any special characters or spaces and are of the form first name and first letter of surname, eg gregf. <br/>Passwords can be changed when users log in.</p>";
	$form .= "<form action=\"$self\" method=\"post\"><fieldset>";
	$form.= "<label for=\"user\">Username: </label><input id=\"user\" type=\"text\" name=\"username\" size=\"40\" /><br/>";
	$form.= " ";
	$form.= "<label for=\"pass\">Password: </label><input id=\"pass\" type=\"password\" name=\"passw\" size=\"40\" /><br/>";
	$form.= " ";
	$form.= "<label for=\"first\">First Name: </label><input id=\"first\" type=\"text\" name=\"displayname\" size=\"40\" /><br/>";
	$form.= " ";
	$form.= "<label for=\"last\">Surname: </label><input id=\"last\" type=\"text\" name=\"lastname\" size=\"40\" /><br/>";
	$form.= " ";
	$form.= "<label>Access Level: </label><select id=\"level\" name=\"level\">
	<option value=\"0\" >Full Access</option>
	<option value=\"1\" selected=\"selected\">Upload Only</option> </select>";
	$form.= "<br/> ";
	$form.= "<label>&nbsp;</label><input id=\"add\" type=\"submit\" name=\"submit\" ";
	$form.= "value=\"Create\" /> </fieldset></form>";

	if($username==null )
	{
		$title=" - Create User Accounts"; 
		include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
		echo "<body>";
		$area="members";
		include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
		echo "<div class=\"left-content padding\"><h2 class=\"middle bold\">Create User Accounts </h2>";
		echo $form;
	}
	else if($username!=null )
	{
		if( !$username or !$displayname or !$passw) 
		{
			$title=" - Create User Accounts"; 
			include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
			echo "<body>";
			include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
			echo "<div class=\"left-content padding\"><h2 class=\"middle bold\">Create User Accounts </h2>";
			echo "<p class=\"redtext middle\">Please complete all fields</p>";
			echo $form;
		}
		else
		{
			include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
			if($username)
			{
				$username=strtolower($username);
				$username = ereg_replace("[^A-Za-z0-9]", "", $username);

				if($submit) 
				{

				}
				$rs = createusers($username,$passw,$displayname,$lastname,$level);
				include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
				sendemail("createuser",$auth,$displayname,$lastname,$username);
				header("Location:users_edit.php?type=$username" );exit();
			}
		}
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>