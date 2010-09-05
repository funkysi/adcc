<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/error/log.php';
 header( "Cache-Control:no-cache");
 $offset = 60 * 60 * 24 * 3;
 $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
 Header($ExpStr);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	$url = getconfig('url');
	$sitetitle = getconfig('title');
	if($title==" - Where We Are") echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" />"; 
	$filename = $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
	include $filename;
?>
<meta name="keywords"
content="digital camera, Arnold, District, Camera, club, adcc, photography, photo,
snapshot, Pond Hills Lane, Greg Foster, Tony Mann, dital camera, photographer, adcc, a&amp;dcc, funkysi" />
<title><?php 
echo $sitetitle.$title; ?></title>
<meta name="Author" content="<?php echo getconfig('webmaster'); ?>" />
<meta name="verify-v1" content="<?php echo getconfig("Sitemap"); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

#if($_SERVER['PHP_SELF']!="/gall/gall_search.php") header( "Cache-Control:no-cache");
	echo "
	<link rel=\"stylesheet\" href=\"".$url."css/reset.css\" type=\"text/css\" />
	<link rel=\"stylesheet\" href=\"".$url."css/screen.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"".$url."css/text.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"".$url."css/menu.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"".$url."css/forms.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"".$url."css/tagcloud.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"".$url."css/cal.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"shortcut icon\" href=\"".$url."favicon.ico\" />
	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Gallery RSS\" href=\"".$url."rss/gall.xml\" />
	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"News RSS\" href=\"".$url."rss/news.xml\" />
	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Schedule RSS\" href=\"".$url."rss/schedule.xml\" />
";
	    ?>
	<?php
	$livemap1=getconfig("livemap1");
	$livemap2=getconfig("livemap2");
	$localmap1=getconfig("localmap1");
	$localmap2=getconfig("localmap2");

if($title==" - Where We Are" and $_SERVER['SERVER_NAME']=="arnoldanddistrictcameraclub.org.uk" )
echo "<link rel=\"stylesheet\" href=\"http://www.arnoldanddistrictcameraclub.org.uk/css/location.css\" type=\"text/css\" />
	<script src=\"".$livemap1."\"
      type=\"text/javascript\"></script>

	<script src=\"".$livemap2."\" type=\"text/javascript\"></script>
	<script src=\"../scripts/gmap.js\" type=\"text/javascript\"></script>";
	
else if($title==" - Where We Are" and $_SERVER['SERVER_NAME']=="www.arnoldanddistrictcameraclub.org.uk" )
echo "<link rel=\"stylesheet\" href=\"http://www.arnoldanddistrictcameraclub.org.uk/css/location.css\" type=\"text/css\" />
	<script src=\"".$livemap1."\"
      type=\"text/javascript\"></script>

	<script src=\"".$livemap2."\" type=\"text/javascript\"></script>
	<script src=\"../scripts/gmap.js\" type=\"text/javascript\"></script>";
	
	else if($title==" - Where We Are")
echo "<link rel=\"stylesheet\" href=\"".$url."css/location.css\" type=\"text/css\" />
<script src=\"".$localmap1."\"
type=\"text/javascript\"></script>
<script src=\"".$localmap2."\" type=\"text/javascript\"></script>
	<script src=\"".$url."scripts/gmap.js\" type=\"text/javascript\"></script>";
?>

	<!--[if IE]>
<style type="text/css" media="screen">

body{behavior:url(<?php echo $url; ?>css/csshover.htc);}
ul ul {
	display:none;
	position: absolute;
	left: 151px;
	top:0px;
}

li:hover ul {
	display:block;
}
#menu{

margin-right:0;
}
</style>
<![endif]-->
</head>