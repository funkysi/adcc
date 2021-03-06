<?php /* Smarty version 2.6.26, created on 2010-07-22 22:33:31
         compiled from CoreHome/templates/sites_selection.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'CoreHome/templates/sites_selection.tpl', 4, false),array('function', 'url', 'CoreHome/templates/sites_selection.tpl', 6, false),array('function', 'hiddenurl', 'CoreHome/templates/sites_selection.tpl', 12, false),)), $this); ?>
<?php if (! false): ?>
<div class="sites_selection">
<span id="sitesSelectionWrapper" style="display:none;" >
	<label><?php echo ((is_array($_tmp='General_Website')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</label><span id="selectedSiteName" style="display:none"><?php echo $this->_tpl_vars['siteName']; ?>
</span>
	<span id="sitesSelection">
		<form action="<?php echo smarty_function_url(array('idSite' => null), $this);?>
" method="get">
		<select name="idSite">
		   <?php $_from = $this->_tpl_vars['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
		   		<option value="<?php echo $this->_tpl_vars['info']['idsite']; ?>
" <?php if ($this->_tpl_vars['idSite'] == $this->_tpl_vars['info']['idsite']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['info']['name']; ?>
</option>
		   <?php endforeach; endif; unset($_from); ?>
		</select>
		<?php echo smarty_function_hiddenurl(array('idSite' => null), $this);?>

		<input type="submit" value="go" />
		</form>
	</span>

	<?php echo '<script type="text/javascript">
	$(document).ready(function() {
		var inlinePaddingWidth=22;
		var staticPaddingWidth=34;
		$("#sitesSelection").fdd2div({CssClassName:"custom_select"});
		$("#sitesSelectionWrapper").show();
		if($("#sitesSelection ul")[0]){
			var widthSitesSelection = Math.max($("#sitesSelection ul").width()+inlinePaddingWidth, $("#selectedSiteName").width()+staticPaddingWidth);
			$("#sitesSelectionWrapper").css(\'padding-right\', widthSitesSelection);
			$("#sitesSelection").css(\'width\', widthSitesSelection);
	
			// this will put the anchor after the url before proceed to different site.
			$("#sitesSelection ul li").bind(\'click\',function (e) {
				e.preventDefault();               
				var request_URL = $(e.target).attr("href");
					var new_idSite = broadcast.getValueFromUrl(\'idSite\',request_URL);
					broadcast.propagateNewPage( \'idSite=\'+new_idSite );
			});
		}else{
			var widthSitesSelection = Math.max($("#sitesSelection").width()+inlinePaddingWidth);
			$("#sitesSelectionWrapper").css(\'padding-right\', widthSitesSelection);
		}
	});</script>
	'; ?>

</span>
</div>
<?php else: ?>
<div class="sites_autocomplete">
    <label>Website</label>
    <div id="sitesSelectionSearch" class="custom_select">
    
        <a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=1" class="custom_select_main_link custom_select_collapsed">BuyForSeniors</a>
        
        <div class="custom_select_block">
            <ul class="custom_select_ul_list"
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=4">CCSlaughterhouse</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=8">CMSJam</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=2">DazzlingDonna</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=9">eBuzdsdsdsdsdz- Coach</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=7">HabariTips</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=30">Name</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=5">PressKitTemplates</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=32">UTC+12</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=3">VistaJunkie</a></li>
                <li><a href="index.php?module=CoreHome&amp;action=index&amp;period=month&amp;date=2009-06-19&amp;idSite=6">WowWayCool</a></li>
            </ul>
            
            <div class="custom_select_all"><a href="#">All websites...</a></div>
            
            <div class="custom_select_search">
                <input type="text" length="15" id="keyword" class="inp">
                <input type="submit" value="Search" class="but">
            </div>
        </div>
	</div>
    
	<?php echo '<script type="text/javascript">
    	$("#sitesSelectionSearch .custom_select_main_link").click(function(){
			$("#sitesSelectionSearch .custom_select_main_link").toggleClass("custom_select_loading");
			$("#sitesSelectionSearch .custom_select_block").toggleClass("custom_select_block_show");
			return false;
		});
    </script>'; ?>

</div>
<?php endif; ?>