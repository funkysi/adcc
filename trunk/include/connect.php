<?php 
$filename = $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
if (file_exists($filename)) {
	include $filename;

	$rs = @mysql_connect( $cfg['host'], $cfg['dbuser'], $cfg['dbpass'] ) or die( "Could not connect to MySQL" );
	$rs = @mysql_select_db( $cfg['dbname'] ) or die( "Could not select database" );
   
} else {
	$goto = "http://".$_SERVER["SERVER_NAME"];
	$goto = $goto."/install/index.php";
	header("Location:$goto");exit();   
}

?>
