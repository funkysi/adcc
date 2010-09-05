<?php /* Smarty version 2.6.25, created on 2010-01-10 21:09:16
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Widgetize/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'loadJavascriptTranslations', '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Widgetize/templates/index.tpl', 4, false),)), $this); ?>
<?php $this->assign('showSitesSelection', true); ?>
<?php $this->assign('showPeriodSelection', true); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreHome/templates/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_loadJavascriptTranslations(array('plugins' => 'Dashboard'), $this);?>


<link rel="stylesheet" type="text/css" href="plugins/CoreHome/templates/styles.css" />
<link rel="stylesheet" type="text/css" href="plugins/CoreHome/templates/datatable.css" />
<link rel="stylesheet" type="text/css" href="plugins/CoreHome/templates/cloud.css" />
<link rel="stylesheet" type="text/css" href="plugins/Dashboard/templates/dashboard.css" />

<script type="text/javascript" src="themes/default/common.js"></script>
<script type="text/javascript" src="libs/swfobject/swfobject.js"></script>
<script type="text/javascript" src="libs/jquery/tooltip/jquery.tooltip.js"></script>
<script type="text/javascript" src="libs/jquery/truncate/jquery.truncate.js"></script>
<script type="text/javascript" src="libs/jquery/jquery.scrollTo.js"></script>
<script type="text/javascript" src="plugins/CoreHome/templates/datatable.js"></script>
<script type="text/javascript" src="plugins/Dashboard/templates/widgetMenu.js"></script>

<script type="text/javascript" src="plugins/Widgetize/templates/widgetize.js"></script>
<!--
	<script src="http://cdn.clearspring.com/launchpad/v2/standalone.js" type="text/javascript"></script>
-->
<?php echo '
<style>
.menu {
	display: inline;
}
.formEmbedCode{
	font-size: 11px;
	text-decoration: none;
	background-color: #FBFDFF;
	border: 1px solid #ECECEC;
	width:220px;
}

#periodString {
	margin-left:500px;
}

label {
	color:#666666;
	line-height:18px;
	margin-right:5px;
	font-weight:bold;
	padding-bottom:100px;
}

#embedThisWidgetIframe,
#embedThisWidgetFlash,
#embedThisWidgetEverywhere {
	margin-top:5px;
}

.menuSelected{
	font-weight:bold;
}
</style>
'; ?>

<script type="text/javascript">
	piwik.availableWidgets = <?php echo $this->_tpl_vars['availableWidgets']; ?>
;
<?php echo '
$(document).ready( function() {
	var menu = new widgetMenu();
	var widgetized = new widgetize();
	menu.init();
	menu.registerCallbackOnWidgetLoad( widgetized.callbackAddExportButtonsUnderWidget );
	menu.registerCallbackOnMenuHover( widgetized.deleteEmbedElements );
	menu.show();
	$(\'#exportFullDashboard\').html(
		widgetized.getInputFormWithHtml( \'dashboardEmbed\', \'<iframe src="\'+document.location.protocol + \'//\' + document.location.hostname + document.location.pathname + \'?\'+\'module=Widgetize&action=iframe&moduleToWidgetize=Dashboard&actionToWidgetize=index&idSite=1&period=week&date=yesterday" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%"></iframe>\')
	);
});

'; ?>

</script>

<div style="max-width:980px;">
	<p>With Piwik, you can export your Web Analytics reports on your blog, website, or intranet dashboard... in one click. 
	If you want your widgets to be viewable by everybody, you first have to set the 'view' permissions 
	to the anonymous user in the <a href='index.php?module=UsersManager'>Users Management section</a>.
	<br>Note: You can also display the full Piwik dashboard in your application or website in an Iframe. 
	For example, for idSite=1 and date=yesterday, you can write: <span id='exportFullDashboard'></span>
	</p>
	
	<div id="widgetChooser">
		<div class="subMenu" id="sub1"></div>
		<div class="subMenu" id="sub2"></div>
		<div class="subMenu" id="sub3"></div>
		<div class="menuClear"></div>
	</div>
	<div id='iframeDivToExport' style='display:none;'></div>
</div>