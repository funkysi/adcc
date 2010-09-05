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
<p class="middle"><a href="<?php if(isset($_SERVER['HTTP_REFERER'])) {echo $_SERVER['HTTP_REFERER']; }?>"><?php if(isset($_SERVER['HTTP_REFERER'])) {echo $_SERVER['HTTP_REFERER']; } ?></a>
</p>
<?php 
	if(isset($_SERVER['HTTP_REFERER'])) 
	{
		$msg=$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL']." Doesn't exist. Error ".$_SERVER['REDIRECT_STATUS']." by ".$_SERVER['REMOTE_ADDR']." at ".$_SERVER['HTTP_REFERER'].", ".$_SERVER['REDIRECT_REQUEST_METHOD'].", ".$_SERVER['REDIRECT_QUERY_STRING'].", ".$_SERVER['REDIRECT_ERROR_NOTES']." !!";

		mail("funkysi1701@googlemail.com", "Website Error", $msg); 
	}
	if(isset($_SERVER['HTTP_REFERER'])) 
	{
		$one=$_SERVER['HTTP_REFERER'];
	}
	$two=$_SERVER['REDIRECT_STATUS'];
	$three=$_SERVER['REMOTE_ADDR'];
	$four=$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL'];

?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>
