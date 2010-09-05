<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	if($_SERVER["HTTP_HOST"]=="adcc.demo"  )
	$dir ="/var/www/html/httpdocs/imgs/photos";
	if($_SERVER["HTTP_HOST"]=="adcc.funkygoth"  )
	$dir="/home/simon3/imgs/photos";
	else $dir = "/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/imgs/photos";

	$opendir = opendir($dir);
	while( false != ( $file = readdir($opendir)))
	{
		if( ( $file != "." ) and ( $file != ".." ) and ( $file != ".svn" ))
		{
			$sql1 = "select count(*) AS numrows1 from image_store where image like '%$file'";
			$sql2 = "select count(*) AS numrows2 from content where image like '%$file'";
			$sql3 = "select count(*) AS numrows3 from users where image like '%$file'";
			#execute the query
			$rs1 = mysql_query( $sql1 ) or die( "Could not execute SQL query" );
			$row1 =		mysql_fetch_array($rs1, MYSQL_ASSOC);
		
			$rs2 = mysql_query( $sql2 ) or die( "Could not execute SQL query" );
			$row2 =		mysql_fetch_array($rs2, MYSQL_ASSOC);
			
			$rs3 = mysql_query( $sql3 ) or die( "Could not execute SQL query" );
			$row3 =		mysql_fetch_array($rs3, MYSQL_ASSOC);
		
			if ($row1['numrows1']+$row2['numrows2']+$row3['numrows3']>0  ) 
			{
				$name="Detected";
				echo $name;
			}
			else 
			{
				$file_list .= "<li>".$file."</li>";
				unlink($dir."/".$file);
				unlink(str_replace('photos','100',$dir)."/".$file);
				unlink(str_replace('photos','140',$dir)."/".$file);
				unlink(str_replace('photos','250',$dir)."/".$file);
				unlink(str_replace('photos','580',$dir)."/".$file);
				unlink(str_replace('photos','740',$dir)."/".$file);
			}
			
		}
	}
	closedir($opendir);
	echo "File List of Image Dir";
	echo "<ul>".$file_list."</ul>";
	echo $dir;
?>