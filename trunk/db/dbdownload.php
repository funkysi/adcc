<?php
function getdownload($id="")
{
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$ans="";
	$sql = "select * from download $id order by id desc ";
	$rs = @mysql_query($sql) or die("Could not execute SQL query".$sql);
	$ans=array();
	$i=0;
	while ($row=mysql_fetch_array($rs))
	{  
				$ans[$i]['id']=$row['id'];
				$ans[$i]['ufile']=$row['ufile'];
				$ans[$i]['disp']=$row['disp'];
				$ans[$i]['comment']=$row['comment'];
				$ans[$i]['size']=$row['size'];
				$ans[$i]['count']=$row['count'];
				$i++;

	}
	return $ans;
}
function getcount()
{	
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from download order by id desc";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}
function setdownload($ufile,$comment,$filesize,$disp)
{
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "insert into download (ufile,comment,size,disp) 
						values (\"$ufile\",\"$comment\",\"$filesize\",\"$disp\")"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
					return $rs;
}
function updatecount($id)
{	
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql="update download set count = count+1  where ufile = '$id'";
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
}
function filesize_format($bytes, $format = '', $force = '')
{
        $force = strtoupper($force);
        $defaultFormat = '%01d %s';
        if (strlen($format) == 0)
            $format = $defaultFormat;
 
        $bytes = max(0, (int) $bytes);
 
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
 
        $power = array_search($force, $units);
 
        if ($power === false)
            $power = $bytes > 0 ? floor(log($bytes, 1024)) : 0;
 
        return sprintf($format, $bytes / pow(1024, $power), $units[$power]);
}
function deletedownload($id)
{
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "DELETE FROM download WHERE id='$id'";
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
}
function updatedownload($disp,$ufile,$comment,$id)
{
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "UPDATE download SET disp='$disp', comment='$comment' WHERE id='$id'"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
}
?>