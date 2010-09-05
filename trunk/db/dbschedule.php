<?php
function maxdate()
{
				include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select Max(date) as max from schedule";
				$rs = @mysql_query($sql) or die("Could not execute SQL query");
				$ans2=mysql_fetch_array($rs, MYSQL_ASSOC);
				return substr($ans2['max'],0,4);
}
function mindate()
{
				include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select Min(date) as min from schedule";
				$rs = @mysql_query($sql) or die("Could not execute SQL query");
				$ans2=mysql_fetch_array($rs, MYSQL_ASSOC);
				return substr($ans2['min'],0,4);
}
function getschedule($arg)
{
				include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select * from schedule where date like '$arg%' order by date asc";
				$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
				$i=0;
				while ($row=mysql_fetch_array($rs))
			    {  
					$ans[$i]['id']=$row['id'];
					$ans[$i]['misc']=$row['misc'];
					$ans[$i]['event']=$row['event'];
					$ans[$i]['date']=$row['date'];
					$i++;
				}
				return $ans;
}	
function countschedule($arg)
{
				include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select count(*) as count from schedule where date like '$arg%' order by date asc";
				$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
				$i=0;
				while ($row=mysql_fetch_array($rs))
			    {  
					$ans=$row['count'];
				}
				return $ans;
}
?>