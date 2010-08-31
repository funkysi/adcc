<?php 
$filename = $_SERVER['DOCUMENT_ROOT'].'/include/config.php';
if (file_exists($filename)) {
	include $filename;

	$rs = @mysql_connect( $cfg['host'], $cfg['dbuser'], $cfg['dbpass'] ) or die( header("Location:http://adcc.funkygoth/config/") );
	$rs = @mysql_select_db( $cfg['dbname'] ) or die( header("Location:http://adcc.funkygoth/config/") );
   
} else {
	$goto = "http://".$_SERVER["HTTP_HOST"];
	$goto = $goto."/config/index.php";
	header("Location:$goto");exit();   
}

?>
