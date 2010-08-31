<?php 
	header("Content-type: text/css"); 
	include_once $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	$logo = getconfig('logo');
	$bg = getconfig('bg');
?>


.title{
	background: url(<?php echo $logo; ?>) no-repeat left center;
	margin-left:10px;
}
html{
  background: #fff url(<?php echo $bg; ?>) left top fixed;
 
}