<?php
set_time_limit(0);
for($id=1;$id<600;$id++)
{
include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
$filename=$_SERVER["DOCUMENT_ROOT"].'/imgs/convert.txt';
//echo "image_store<br/>"	;			
$sql = "select * from image_store where id=$id";
			    $rs = @mysql_query($sql) or die("Could not execute SQL query");
			    while ($row=mysql_fetch_array($rs))
			    { 
				if($row['image']!='')
				{
				$image = $row['image'];
				#include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
			image_resize(740,740,'740',$image);
			 image_resize(100,100,'100',$image);
			 image_resize(140,140,'140',$image);
			 image_resize(250,250,'250',$image);
			 image_resize(580,580,'580',$image);
$file = fopen( $filename, "a+" );
fwrite( $file, $id." i ".$image."\n");
fclose( $file );
				}
				else $image=null;

}
//echo "users<br/>"	;				
$sql = "select * from users where id=$id";
			    $rs = @mysql_query($sql) or die("Could not execute SQL query");
			    while ($row=mysql_fetch_array($rs))
			    { 
				if($row['image']!='')
				{
				$image = $row['image'];
				#include $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
			image_resize(740,740,'740',$image);
			 image_resize(100,100,'100',$image);
			 image_resize(140,140,'140',$image);
			 image_resize(250,250,'250',$image);
			 image_resize(580,580,'580',$image);
$file = fopen( $filename, "a+" );
fwrite( $file, $id." u ".$image."\n");
fclose( $file );	
				}
				else $image=null;
			
}	
// echo "content<br/>"	;
$sql = "select * from content where id=$id";
			    $rs = @mysql_query($sql) or die("Could not execute SQL query");
			    while ($row=mysql_fetch_array($rs))
			    { 
				if($row['image']!='')
				{
				$image = $row['image'];
				
			image_resize(740,740,'740',$image);
			image_resize(100,100,'100',$image);
			image_resize(140,140,'140',$image);
			image_resize(250,250,'250',$image);
			image_resize(580,580,'580',$image);
			$file = fopen( $filename, "a+" );
fwrite( $file, $id." c ".$image."\n");
fclose( $file );
}
else $image=null;

				}	
}			
?>