<?php
	include $_SERVER["DOCUMENT_ROOT"].'/include/geturl.php';
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	if($_SERVER["HTTP_HOST"]=="adcc.funkygoth") $header=" (TEST)";
	$sql2 = "select * from config where name='email'";
	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs2 ) ) 
	{
		$to=$row['setting'].", funkysi1701@googlemail.com, ";
	}
	$date=date("Y-m-d H:i:s");
	if($email!="") $to=$email;
	$msg=$msg."\nThis is an automatically generated email created by the Arnold and District Camera Club website.\nhttp://www.arnoldanddistrictcameraclub.org.uk.\n  If you believe you have received this email in error please contact funkysi1701@googlemail.com.";
	$from="From: arnoldcameraclub@googlemail.com \r\n";
	$sub.=$header;
	mail ($to, $sub, $msg,$from);
?>
