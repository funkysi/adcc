<?php
function getuser($username,$passw) {
						$msg='';
						$level ='';
						include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
						$sql = "select * from users where username=\"$username\" and passw = \"$passw\" ";
 
						#execute the query
						$rs = mysql_query( $sql ) or die( "Could not execute query" );

						#get number of rows that match username and password
						$num = mysql_numrows( $rs );

						while ( $row = mysql_fetch_array( $rs ) ) 
						{
							$level=$row["level"];
						}
						if( $num != 0 )
						{ 
							setcookie( "auth_new", "$username",time()+86400 , "/" );
							setcookie( "level_new", "$level",time()+86400 , "/" );
							$msg="";
							#echo $_SERVER["HTTP_HOST"];
							header( "Location:access.php" ); 
						}
						else
						{
						  $msg = "<p class=\"red bold middle\">Login Failed! Please retry</p> "; 
						}
			return $msg;
}
function getallusers()
{
				include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select * from users where level = 1 and gall_null = 0 order by lastname";
				$rs = @mysql_query($sql) or die("Could not execute SQL query");
				$ans=array();
				$i=0;
				while ($row=mysql_fetch_array($rs))
				{
					$ans[$i]['username']=$row['username'];
					$ans[$i]['displayname']=$row['displayname'];
					$ans[$i]['lastname']=$row['lastname'];
					$i++;
				}
				return $ans;
}
function getuploadusers()
{
				include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select * from users WHERE LEVEL = 1 order by username";
				$rs = @mysql_query($sql) or die("Could not execute SQL query");
				$ans=array();
				$i=0;
				while ($row=mysql_fetch_array($rs))
				{
					$ans[$i]['username']=$row['username'];
					$ans[$i]['displayname']=$row['displayname'];
					$ans[$i]['lastname']=$row['lastname'];
					$i++;
				}
				return $ans;
}
function getall_users()
{
				include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select * from users order by lastname";
				$rs = @mysql_query($sql) or die("Could not execute SQL query");
				$ans=array();
				$i=0;
				while ($row=mysql_fetch_array($rs))
				{
					$ans[$i]['username']=$row['username'];
					$ans[$i]['displayname']=$row['displayname'];
					$ans[$i]['lastname']=$row['lastname'];
					$i++;
				}
				return $ans;
}
function getusercount()
{	
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from users where level = 1 and gall_null = 0 order by lastname";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function getallusercount()
{	
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from users";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function getfullusercount()
{	
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from users where level ='1'";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function getcurrentuser($auth)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select * from users where id='$auth'";

					$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
					$ans=array();
					$i=0;
					while ( $row = mysql_fetch_array( $rs ) ) 
					{
						$ans[$i]['displayname']=$row['displayname'];
						$ans[$i]['lastname']=$row['lastname'];
						$ans[$i]['username']=$row['username'];
						$ans[$i]['role']=$row['role'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['email']=$row['email'];
						$ans[$i]['about']=$row['about'];
						$ans[$i]['id']=$row['id'];
						$ans[$i]['order']=$row['order_nu'];
						$i++;
					}
					return $ans;
}
function getuserbyusername($auth)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select * from users where username='$auth'";

					$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
					$ans=array();
					$i=0;
					while ( $row = mysql_fetch_array( $rs ) ) 
					{
						$ans[$i]['displayname']=$row['displayname'];
						$ans[$i]['lastname']=$row['lastname'];
						$ans[$i]['username']=$row['username'];
						$ans[$i]['role']=$row['role'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['email']=$row['email'];
						$ans[$i]['about']=$row['about'];
						$ans[$i]['id']=$row['id'];
						$ans[$i]['passw']=$row['passw'];
						$i++;
					}
					return $ans;
}
function getcommittee()
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select * from users where role is not null and role !='' order by order_nu asc ";
					$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
					$ans=array();
					$i=0;
					while ( $row = mysql_fetch_array( $rs ) ) 
					{
						$ans[$i]['displayname']=$row['displayname'];
						$ans[$i]['lastname']=$row['lastname'];
						$ans[$i]['username']=$row['username'];
						$ans[$i]['role']=$row['role'];
						$ans[$i]['image']=$row['image'];
						$ans[$i]['id']=$row['id'];
						$i++;
					}
					return $ans;
}
function getcommcount()
{	
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from users where role is not null and role !='' order by order_nu asc";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function updateuser($image,$role,$displayname,$lastname,$about,$email,$order,$id)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql="UPDATE users SET image='$image', role='$role',displayname='$displayname',lastname='$lastname', 									about='$about', email='$email',order_nu='$order' WHERE id='$id'"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
}
function updatepassword($auth,$password2)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "UPDATE users SET passw='$password2' WHERE username='$auth'";
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
}
function createusers($username,$passw,$displayname,$lastname,$level)
{
					include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "insert into users (username,passw,displayname,lastname, level, gall_null)	values (\"$username\",\"$passw\",\"$displayname\",\"$lastname\",\"$level\",1)";
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
					$sql2 = "insert into permission (userid,location,level) values (\"$username\",\"password\",\"1\")";
					$rs2 = mysql_query($sql2) or die ("Could not execute SQL query update content".$sql2);			
}
function createRandomPassword() {

	$chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;

    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;
}
?>
