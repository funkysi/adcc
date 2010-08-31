<?php  
	$title=" - Google Analytics Usage Report"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
	require_once '../include/getcookie.php';
?>
<body>
<?php 
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Usage Report</h2>
	<p class="middle"><a href="image_report.php">Page 1</a></p>
<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$self = $_SERVER['PHP_SELF'];
	if(isset($_POST['date']))
	{
		$type = $_POST['date'];
	}
	else $type=date("mY");
	if(isset($_GET['date']))
	{
	    $type = $_GET['date'];
	}

	if(isset($_POST['submit']))
	{	
		$submit = $_POST['submit'];
	}
?>	
<br/>
	<div class="middle">
	
		<div id="widgetIframe"><iframe width="100%" height="650" src="http://www.arnoldanddistrictcameraclub.org.uk/charts/piwik/index.php?module=Widgetize&action=iframe&moduleToWidgetize=VisitsSummary&actionToWidgetize=index&idSite=2&period=day&date=<?php echo date("Y-m-d", time()-86400); ?>&disableLink=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
		
		<br/>
		<div id="widgetIframe"><iframe width="500" height="300" src="http://www.arnoldanddistrictcameraclub.org.uk/charts/piwik/index.php?module=Widgetize&action=iframe&moduleToWidgetize=UserSettings&actionToWidgetize=getBrowser&idSite=2&period=month&date=<?php echo date("Y-m-d", time()-86400); ?>&disableLink=1&viewDataTable=graphPie" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
		<br/>
		<div id="widgetIframe"><iframe width="100%" height="400" src="http://www.arnoldanddistrictcameraclub.org.uk/charts/piwik/index.php?module=Widgetize&action=iframe&moduleToWidgetize=Referers&actionToWidgetize=getKeywords&idSite=2&period=year&date=<?php echo date("Y-m-d", time()-86400); ?>&disableLink=1" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
</div>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>