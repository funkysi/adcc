<?php
function getimage()
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select * from image_store order by date desc";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						
						$ans[$i]['image']=$row['image'];
						$i++;
					}
	return $ans;
}
function getimage_content()
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select * from content";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    	{
						$ans[$i]['image']=$row['image'];
						$i++;
					}
	return $ans;
}
function getimage_users()
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select * from users";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						
						$ans[$i]['image']=$row['image'];
						$i++;
					}
	return $ans;
}
function countimages()
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select count(*) as max from image_store";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans=$row['max'];
						$i++;
					}
	return $ans;
}
function countimages_content()
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select count(*) as max from content";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans=$row['max'];
						$i++;
					}
	return $ans;
}
function countimages_users()
{
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select count(*) as max from users";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans=$row['max'];
						$i++;
					}
	return $ans;
}
function ftpconnect()
{
	$ftp_server='80.82.115.41';
	$ftp_user_name='simon1701';
	$ftp_user_pass='ncc1701';
	
	$conn_id = ftp_connect($ftp_server);
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	return $conn_id;
}
function download($conn_id,$filename,$ftp_path,$LIVE_PATH,$err)
{
	$ftp_server='80.82.115.41';
	$ftp_user_name='simon1701';
	$ftp_user_pass='ncc1701';
	
	$sql_lfile=$LIVE_PATH."/".$filename;
	$sql_rfile=$ftp_path."/".$filename;

	if (file_exists($sql_lfile))
	{
		$res = ftp_size($conn_id, $sql_rfile);
		if ($res != -1) 
		{

		} 
		else 
		{
			echo "couldn't get the size";
		}
		$filesize = filesize($sql_lfile);

		if($filesize!=$res)
		{
			unlink($sql_lfile);
			if (ftp_get($conn_id, $sql_lfile, $sql_rfile, FTP_BINARY)) 
			{
				$err=0;
			} 
			else 
			{
				$err=2;
			}
		}
	}
	else
	{
		if (ftp_get($conn_id, $sql_lfile, $sql_rfile, FTP_BINARY)) 
		{
			$err=0;
		} 
		else 
		{
			$err=1;
		}
	}

	return $err;
}
$err=0;
include_once $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
$files = array("adcc_imgs_site.tar.gz","adcc_live.sql","adcc_live_sm.tar.gz");
$n = count($files);
$conn_id = ftpconnect();
foreach($files as $value)
{
	$err = download($conn_id,$value,'httpdocs/backup/version2',$cfg['backup'],$err);
}	

$id=0;
$max = countimages();
$ans = getimage();
$j=1;
while($id<$max)
{
	
	$im[$id] = str_replace('../imgs/photos/','',$ans[$id]['image']);
	$id++;
	
}
foreach($im as $value)
{
	$err=0;
	$err = download($conn_id,$value,'httpdocs/imgs/100',$cfg['backup'].'/imgs/100',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/140',$cfg['backup'].'/imgs/140',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/250',$cfg['backup'].'/imgs/250',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/580',$cfg['backup'].'/imgs/580',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/740',$cfg['backup'].'/imgs/740',$err);
	if($err==1) echo $j." ".$value." ".$err."<br/>";
	$j++;
}
$max = countimages_content();
$ans = getimage_content();
$id=0;
while($id<$max)
{
	if($ans[$id]['image']!='') $uim[$id] = str_replace('../imgs/photos/','',$ans[$id]['image']);
	$id++;
	
}
foreach($uim as $value)
{
	$err=0;
	$err = download($conn_id,$value,'httpdocs/imgs/100',$cfg['backup'].'/imgs/100',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/140',$cfg['backup'].'/imgs/140',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/250',$cfg['backup'].'/imgs/250',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/580',$cfg['backup'].'/imgs/580',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/740',$cfg['backup'].'/imgs/740',$err);
	if($err==1) echo $j." ".$value." c ".$err."<br/>";
	$j++;
}
$max = countimages_users();
$ans = getimage_users();
$id=0;
while($id<$max)
{
	if($ans[$id]['image']!='') $cim[$id] = str_replace('../imgs/photos/','',$ans[$id]['image']);
	$id++;
	
}
foreach($cim as $value)
{
	$err=0;
	$err = download($conn_id,$value,'httpdocs/imgs/100',$cfg['backup'].'/imgs/100',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/140',$cfg['backup'].'/imgs/140',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/250',$cfg['backup'].'/imgs/250',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/580',$cfg['backup'].'/imgs/580',$err);
	$err = download($conn_id,$value,'httpdocs/imgs/740',$cfg['backup'].'/imgs/740',$err);
	if($err==1) echo $j." ".$value." u ".$err."<br/>";
	$j++;
}
echo "finished";
?>

