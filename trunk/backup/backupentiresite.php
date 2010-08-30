<?php
function ftpconnect()
{
        $SCRIPT_PATH='';
        $DEMO_PATH='';
        $ftp_server='ftp.arnoldanddistrictcameraclub.org.uk';
        $ftp_user_name='simon1701';
        $ftp_user_pass='ncc1701';
        $conn_id = ftp_connect($ftp_server);
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
        return $conn_id;
}
function download($conn_id,$filename,$ftp_path,$LIVE_PATH,$err)
{
        $SCRIPT_PATH='';
        $DEMO_PATH='';
        $ftp_server='ftp.arnoldanddistrictcameraclub.org.uk';
        $ftp_user_name='simon1701';
        $ftp_user_pass='ncc1701';
        $lfile=$LIVE_PATH."/".$filename;
        $rfile=$ftp_path."/".$filename;
        if (file_exists($lfile))
        {
                $res = ftp_size($conn_id, $rfile);
                if ($res != -1)
                {

                }
                else
                {
                        echo "couldn't get the size";
                }
                $filesize = filesize($lfile);

                if($filesize!=$res)
                {
                        unlink($lfile);
                        if (ftp_get($conn_id, $lfile, $rfile, FTP_BINARY))
                        {
                                $err=0;
				echo "reupload ".$lfile."\n";
                        }
                        else
                        {
                                $err=2;
                        }
                }
        }
        else
        {
                if (ftp_get($conn_id, $lfile, $rfile, FTP_BINARY))
                {
                        $err=0;
			echo "new upload ".$lfile."\n";
                }
                else
                {
                        $err=1;
                }
        }
        return $err;
}
function raw_list($folder,$conn_id,$lfolder) 
{ 
	Global $files; 
	$list     = ftp_rawlist($conn_id, $folder); 
	$anzlist  = count($list); 
	$i = 0;
	if(!file_exists($lfolder."/".$folder)) mkdir($lfolder."/".$folder); 
	while ($i < $anzlist): 
  		$split    = preg_split("/[\s]+/", $list[$i], 9, PREG_SPLIT_NO_EMPTY); 
  		$ItemName = $split[8]; 
  		$endung   = strtolower(substr(strrchr($ItemName,"."),1)); 
  		$path     = "$folder/$ItemName";
		if($ItemName!="." and $ItemName!=".." and substr($split[0],0,1)=="-") 	
		{
		#	if(!file_exists($lfolder."/".$path))	
		#	{
				$err = download($conn_id,$ItemName,$folder,$lfolder."/".$folder,0);
				if($err!=0) echo $err." ".$ItemName." ".$lfolder."/".$folder."\n";
			#	echo substr($split[0],0,1)."\n";
		#	}
		}

  		if (substr($list[$i],0,1) === "d" AND substr($ItemName,0,1) != "."): 
      			array_push($files, $path); # write directory in array if desired 
     			raw_list($path,$conn_id,$lfolder); 
  		elseif (substr($ItemName,0,2) != "._"): 
     			array_push($files, $path); 
  		endif; 
  		$i++; 
	endwhile; 
return $files; 
} 
$dir = "httpdocs";
date_default_timezone_set('UTC');
echo date("H:i d-m-Y")." Backup Started of ".$dir." \n";
$conn_id = ftpconnect();
$err=0;
$files = array ();
$files = raw_list($dir,$conn_id,"/var/www/html/private/backup");
$n = count($files);
$i=0;
while ($i < $n): 
#  	echo "$files[$i]\n"; 
  	$i++; 
endwhile;

echo date("H:i d-m-Y")." Backup Finished of ".$dir." \n";

#foreach($files as $value)
#{
#	$err = download($conn_id,$value,'/','/var/www/vhosts/backup-oldecm',$err);
#}
?>
