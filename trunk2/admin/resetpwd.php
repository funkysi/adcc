<?php
	$username="";
	$email="";
	$result="";
	if(isset($_POST['submit']))
	{
		$submit = $_POST['submit'];
	}
	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
	}
	if(isset($_POST['username']))
	{
		$username = $_POST['username'];
	}
	
	
	$self = $_SERVER['PHP_SELF'];
	$date=date("Y-m-d H:i:s");
	
	if(isset($_REQUEST['id']))
	{
		$result=$_REQUEST['id'];
	} 
	
	if(isset($_REQUEST['user']))
	{
		$name=$_REQUEST['user'];
	}
	
	if(isset($_REQUEST['email']))
	{
		$email=$_REQUEST['email'];
	}
	else $result=0;
	
	if($result==1)
	{
		$title=" - Reset Password"; 
		include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
		$area="members";
		echo "<body>";
		include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 	
		echo "<div class=\"left-content padding\"><a name=\"content\"></a> <h2 class=\"middle bold\">Reset Forgotten Password</h2><p class=\"middle\">$name - your log-in details have been emailed to <a href=\"mailto:".$email."\">".$email."</a></p><p class=\"middle\">Return to <a href=\"../admin/\">Login page</a></p>";	
	}

	if($username==null and $result==0)
	{
		$title=" - Reset Password"; 
		include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
		$area="members";
		echo "<body>";
		include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';

		echo "<div class=\"left-content padding\"><a name=\"content\"></a> <h2 class=\"middle bold\">Reset Forgotten Password</h2>
		<form action = \"$self\" method = \"post\">
	 		<fieldset class=\"login\">
	 			<label class=\"bold\" for=\"username\">Username:</label>
	 			<input tabindex=\"1\" id=\"username\" alt=\"username\" type = \"text\" name = \"username\" value=\"$username\" /><br/>
				<label class=\"bold\" for=\"email\">Email Address:</label>
	 			<input tabindex=\"2\" class=\"email\" id=\"email\" alt=\"email\" type = \"text\" name = \"email\" value=\"$email\" /><br/>
				<label>&nbsp;</label>
				<input tabindex=\"3\" id=\"login\" type = \"submit\" name=\"submit\" value = \"Reset\" />
<a href=\"index.php\">Back</a>
	 		</fieldset>
	 	</form>
	<p class=\"padding\">Please enter your username and email address. </p><p>If you have not registered you email address with us this automatic service will not work and you will have to contact us with the email address below.</p> ";

	}
	else if($username!=null and $result==0)
	{
		include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';

		$query   = "SELECT COUNT(*) AS numrows FROM users where username='$username' and email = '$email'";
		$result  = mysql_query($query) or die('Error, query failed');
		$row     = mysql_fetch_array($result, MYSQL_ASSOC);
		$numrows = $row['numrows'];
	 
		#create the query 
		$sql = "select * from users where username='$username' and email = '$email' ";
	 
		#execute the query
		$rs = @mysql_query( $sql ) or die( "Could not execute query" );

		#get number of rows that match username and password

		while ( $row     = mysql_fetch_array($rs) ) 
		{
			$username2=$row['username'];
			$email2=$row['email'];
			$name=$row['displayname']." ".$row['lastname'];
		}	
		if($numrows==1)
		{
			setcookie( "auth", "ok", time()-1800, "/" );
			setcookie( "level", "ok", time()-1800, "/" );
			include $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
			$password = createRandomPassword();
			$class="Reset Password";
			$sub="New Login Details for Arnold and District Camera Club";
			$msg="Your new password for Arnold and District Camera Club is below, to logon please goto http://www.arnoldanddistrictcameraclub.org.uk\nUsername: ".$username."\nPassword: ".$password."\n\n";
			$type=$username;
			include $_SERVER["DOCUMENT_ROOT"].'/include/newemail.php';
			sendemail("resetpwd",$username,$password);
			$password=md5($password);
			$query2="update users set passw='$password' where username='$username'";
			$result2=mysql_query($query2);
			$result=1;
			$username=null;
		
			header("Location:$self?id=$result&user=$name&email=$email2");
		}
		else 
		{
			$title=" - Reset Password"; 
			include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php';
			$area="members";
			echo "<body>";
			include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
			echo "<div class=\"left-content padding\"><a name=\"content\"></a> <h2 class=\"middle bold\">Reset Forgotten Password</h2>";
			echo "<form action = \"$self\" method = \"post\">
			 		<fieldset class=\"login\">
			 			<label class=\"bold\" for=\"username\">Username:</label>
			 			<input tabindex=\"1\" id=\"username\" alt=\"username\" type = \"text\" name = \"username\" value=\"$username\" /><br/>
						<label class=\"bold\" for=\"email\">Email Address:</label>
			 			<input tabindex=\"2\" id=\"email\" alt=\"email\" type = \"text\" name = \"email\" value=\"$email\" /><br/>
						<label>&nbsp;</label>
						<input tabindex=\"3\" type = \"submit\" name=\"submit\" value = \"Reset\" />
<a href=\"index.php\">Back</a>
			 		</fieldset>
			 	</form>
			<p class=\"padding\">Please enter your username and email address. </p><p>If you have not registered you email address with us this automatic service will not work and you will have to contact us with the email address below.</p> ";
		}
	}	
?>
</div>
<?php
	$area="members";
	#include_once $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
