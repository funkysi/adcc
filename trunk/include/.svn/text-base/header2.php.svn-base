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
	include_once $_SERVER['DOCUMENT_ROOT'].'/db/dbconfig.php';
	$url = getconfig('url');
	$sitetitle = getconfig('title');
	if($title==" - Where We Are") echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" />"; 
	$filename = 'config.php';
	include $filename;
?>
<meta name="keywords"
content="digital camera, Arnold, District, Camera, club, adcc, photography, photo,
snapshot, Pond Hills Lane, Greg Foster, Tony Mann, dital camera, photographer, adcc, a&amp;dcc, funkysi" />
<title><?php 
echo $sitetitle.$title; ?></title>
<meta name="Author" content="<?php echo getconfig('webmaster'); ?>" />
<meta name="verify-v1" content="<?php echo getconfig("Sitemap"); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$imgurl = $_SERVER['HTTP_HOST'];
if($_SERVER['HTTP_HOST']=='www.funkysi.co.uk' or $_SERVER['HTTP_HOST']=='www.arnoldanddistrictcameraclub.org.uk') $imgurl = str_replace('www','imgs',$_SERVER['HTTP_HOST']);
if($_SERVER['HTTP_HOST']=='adcc.funkygoth' or $_SERVER['HTTP_HOST']=='adcc.funkygoth:85') $imgurl = str_replace('adcc','imgs',$_SERVER['HTTP_HOST']);
#if($_SERVER['PHP_SELF']!="/gall/gall_search.php") header( "Cache-Control:no-cache");
	echo "
	<link rel=\"stylesheet\" href=\"http://".$imgurl."/css/reset.css\" type=\"text/css\" />
	<link rel=\"stylesheet\" href=\"http://".$imgurl."/css/screen.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"http://".$imgurl."/css/text.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"http://".$imgurl."/css/menu.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"http://".$imgurl."/css/forms.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"http://".$imgurl."/css/tagcloud.css\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"stylesheet\" href=\"http://".$imgurl."/css/cal.css\" type=\"text/css\" media=\"screen, projection\" />
		<link rel=\"stylesheet\" href=\"http://".$_SERVER['HTTP_HOST']."/css/image.php\" type=\"text/css\" media=\"screen, projection\" />
	<link rel=\"shortcut icon\" href=\"http://".$_SERVER['HTTP_HOST']."/favicon.ico\" />
	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Gallery RSS\" href=\"http://".$_SERVER['HTTP_HOST']."/rss/gall.xml\" />
	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"News RSS\" href=\"http://".$_SERVER['HTTP_HOST']."/rss/news.xml\" />
	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Schedule RSS\" href=\"http://".$_SERVER['HTTP_HOST']."/rss/schedule.xml\" />
	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Changes RSS\" href=\"http://".$_SERVER['HTTP_HOST']."/rss/changes.xml\" />
";
	    ?>
	<?php
	#$livemap1=getconfig("livemap1");
	#$livemap2=getconfig("livemap2");
	#$localmap1=getconfig("localmap1");
	#$localmap2=getconfig("localmap2");

if($title==" - Where We Are"  )
echo "<link rel=\"stylesheet\" href=\"".$url."css/location.css\" type=\"text/css\" />
	<script src=\"".getconfig("livemap1")."\"
      type=\"text/javascript\"></script>

	<script src=\"".getconfig("livemap2")."\" type=\"text/javascript\"></script>
	<script src=\"../scripts/gmap.js\" type=\"text/javascript\"></script>";
	

?>
<?php date_default_timezone_set('UTC'); if (date("m-d")=="12-25") echo "<script src=\"../scripts/snow.js\" type=\"text/javascript\"></script>"; ?>
	<!--[if IE]>
<style type="text/css" media="screen">

body{behavior:url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/css/csshover.htc);}
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
<?php if(isset($tinymce) and $tinymce=="true") echo "
<script type=\"text/javascript\" src=\"http://".$_SERVER['HTTP_HOST']."/scripts/tiny_mce/tiny_mce.js\"></script>
<script type=\"text/javascript\" src=\"http://".$_SERVER['HTTP_HOST']."/scripts/tiny_mce/plugins/AtD/editor_plugin.js\"></script>
<script type=\"text/javascript\">
	tinyMCE.init({
		// General options
		mode : \"textareas\",
		theme : \"advanced\",
		plugins : \"style,layer,table,save,advhr,advimage,advlink,emotions,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,AtD\",

		// Theme options
		theme_advanced_buttons1 : \"bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,forecolor,backcolor,|,blockquote,AtD,help,preview\",
		
theme_advanced_buttons2 : \"\",		
		theme_advanced_toolbar_location : \"top\",
		theme_advanced_toolbar_align : \"left\",
		theme_advanced_statusbar_location : \"bottom\",
		theme_advanced_resizing : true,
		/* the URL to the button image to display */
		atd_button_url              : \"../scripts/tiny_mce/plugins/AtD/atdbuttontr.gif\",

		/* the URL of your proxy file */
		atd_rpc_url                 : \"../scripts/tiny_mce/plugins/AtD/server/proxy.php?url=\",

		/* set your API key */
		atd_rpc_id                  : \"dashnine\",

		/* edit this file to customize how AtD shows errors */
		atd_css_url                 : \"../css/AtD_content.css\",
 
		// Example content CSS (should be your site CSS)
		content_css : \"../css/content.css\",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : \"lists/template_list.js\",
		external_link_list_url : \"lists/link_list.js\",
		external_image_list_url : \"lists/image_list.js\",
		media_external_list_url : \"lists/media_list.js\",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : \"Some User\",
			staffid : \"991234\"
		}
	});
</script>"; ?>
</head>
