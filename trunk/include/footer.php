<?php
	if(!isset($nomenu))
	{
?>
<div class="sidebar">
<div id="menu" >

<?php 
	include_once $_SERVER["DOCUMENT_ROOT"].'/db/dbuser.php';
	include_once $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	#$url = getconfig('url');
	#$sitetitle = getconfig('title');
	$self =$_SERVER['PHP_SELF']; 
	if(!isset($_COOKIE['level_new']))  
	{
		$level = "not set";
	}
	else $level = $_COOKIE['level_new'];
	if(!isset($_COOKIE['auth_new']))  
	{
		$auth = "UNKNOWN";
	}
	else 
	{
		$auth = $_COOKIE['auth_new'];
		$ans=getuserbyusername($auth);		
		$name=$ans[0]['displayname']." ".$ans[0]['lastname'];
	}

	if($_SERVER['SERVER_NAME']=="arnoldanddistrictcameraclub.org.uk" or $_SERVER['SERVER_NAME']=="www.arnoldanddistrictcameraclub.org.uk") 
	echo "<script src=\"http://www.google-analytics.com/urchin.js\" type=\"text/javascript\">
	</script>
	<script type=\"text/javascript\">
	_uacct = \"".getconfig('Analytics')."\";
	urchinTracker();
	</script>";
	echo "<br/>";

	if ($level=="0") # if logged in with full access
	##################################################
	{	
		include $_SERVER["DOCUMENT_ROOT"].'/include/menu0.php';
	} 
	else if ($level=="1") # if logged in with upload access
	###################################################
	{
		include_once $_SERVER["DOCUMENT_ROOT"].'/include/menu1.php';
	}
	else if ($level=="2") # if logged in with Progsec access
	###################################################
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/menu2.php';
	}
	else if ($level!="1" or $level!="0") # Not logged in yet
	#########################################################
	{
		include $_SERVER["DOCUMENT_ROOT"].'/include/menu5.php';
	}
?>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/search.php';
	echo getconfig('awa'); 
?>
</div>
</div>
<?php
}
if(isset($news))
{
	include $_SERVER["DOCUMENT_ROOT"].'/news/news-insert.php';
}
?>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/revision.php';
	include $_SERVER["DOCUMENT_ROOT"].'/revision2.php';
?>
<div class="footer middle">
<p>Copyright &copy; <?php echo date("Y"); echo " ".$sitetitle; ?>. </p>
<p>This site is maintained by <a href="mailto:<?php echo getconfig('email'); ?>?Subject=<?php echo $url; ?>"><?php echo getconfig('webmaster'); ?></a>. 
Web design and code by <a href="mailto:funkysi1701@gmail.com?Subject=<?php echo $url; ?>">Simon Foster</a>. </p>
<p>For details about other projects Simon is available for <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/fsi.php">please click here</a>.
</p>
<p><?php if($_SERVER['SERVER_NAME']!="arnoldanddistrictcameraclub.org.uk" and $_SERVER['SERVER_NAME']!="www.arnoldanddistrictcameraclub.org.uk") echo "Server: ".$_SERVER['SERVER_ADDR']."<br/>DB: ".$cfg['dbname']."<br/>Path: ".$_SERVER['DOCUMENT_ROOT']."<br/>Version: ".$svnversion."<br/>Date: ".$svndate."<br/>"; ?></p>
</div>
<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://arnoldanddistrictcameraclub.org.uk/charts/piwik/" : "http://arnoldanddistrictcameraclub.org.uk/charts/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 2);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://arnoldanddistrictcameraclub.org.uk/charts/piwik/piwik.php?idsite=2" style="border:0" alt=""/></p></noscript>
<!-- End Piwik Tag -->
