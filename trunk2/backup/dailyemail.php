<?php
	date_default_timezone_set('UTC');
	#$date=date("Y-m-d");
	$date = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d") - 1, date("Y")));
	$url=getconfig('url');
	$email=getconfig('email');
	$message="";
	$subject="";
#echo $yesterday;
echo $date;
	$sql2 = "select * from log where date like '$date%'";
	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query 10" );
	while ( $row = mysql_fetch_array( $rs2 ) ) 
	{
		$subject="Arnold and District Camera Club: Activity on ".$date;
		$message.=$row['subject']." \r\n".$row['message']." \r\n\n";
	}
	$to="funkysi1701@googlemail.com";
	$from="From: ".$email." \r\n";
	$message=$message."\n\nThis is an automatically generated email created by the Arnold and District Camera Club website.\n".$url.".\nIf you believe you have received this email in error please contact funkysi1701@googlemail.com.";
	if($subject!=null)
	{
		mail ($to, $subject, $message,$from);
	}	
function getconfig($name)
{
	$cfg['host']='localhost';
	$cfg['dbname']='@@dbname@@';
	$cfg['dbuser']='root';
	$cfg['dbpass']='ncc1701';

	$rs = @mysql_connect( $cfg['host'], $cfg['dbuser'], $cfg['dbpass'] ) or die( "Could not connect to MySQL" );
	$rs = @mysql_select_db( $cfg['dbname'] ) or die( "Could not select database" );
   

	$ans="";
	$sql="select * from config where name='$name'";
	$rs = @mysql_query($sql) or die("Could not execute SQL query 28".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans=$row['setting'];
						$i++;
					}
	return $ans;
}	
?>
