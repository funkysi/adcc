<?php 
	$title=" - Error Page"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Error Page</h2>
	<p class="middle">Unfortunately there has been an error.<br/>Please click your <a href="javascript:history.back(1)">back</a> button or select one of the links on the left.</p>
	<p class="middle">
		<a href="<?php if(isset($_SERVER['HTTP_REFERER'])) {echo $_SERVER['HTTP_REFERER']; }?>"><?php if(isset($_SERVER['HTTP_REFERER'])) {echo $_SERVER['HTTP_REFERER']; } ?></a>
	</p>
<?php 
	if(isset($_SERVER['HTTP_REFERER'])) 
	{
		$msg=$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL']." Doesn't exist. Error ".$_SERVER['REDIRECT_STATUS']." by ".$_SERVER['REMOTE_ADDR']." at ".$_SERVER['HTTP_REFERER'].", ".$_SERVER['REDIRECT_REQUEST_METHOD']."!!";

		
	}
	if(isset($msg))
	mail("funkysi1701@googlemail.com", "Website Error", $msg, "From: error@".$_SERVER["HTTP_HOST"]); 
	if(isset($_SERVER['HTTP_REFERER'])) 
	{
		$one=$_SERVER['HTTP_REFERER'];
	}
	$two=$_SERVER['REDIRECT_STATUS'];
	$three=$_SERVER['REMOTE_ADDR'];
	$four=$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL'];

?>
<style type="text/css">
  #goog-wm {text-align:center; }
  #goog-wm h3.closest-match { }
  #goog-wm h3.closest-match a { }
  #goog-wm h3.other-things { }
  #goog-wm ul li { }
  #goog-wm li.search-goog { display: block; }
</style>
<script type="text/javascript">
  var GOOG_FIXURL_LANG = 'en_GB';
  var GOOG_FIXURL_SITE = 'http://www.arnoldanddistrictcameraclub.org.uk/';
</script>
<script type="text/javascript" 
    src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>

</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
