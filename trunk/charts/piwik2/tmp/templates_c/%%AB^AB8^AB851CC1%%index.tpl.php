<?php /* Smarty version 2.6.25, created on 2010-01-10 14:12:24
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/UserSettings/templates/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/UserSettings/templates/index.tpl', 2, false),)), $this); ?>
<div id='leftcolumn'>
	<h2><?php echo ((is_array($_tmp='UserSettings_BrowserFamilies')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTableBrowserType']; ?>

	
	<h2><?php echo ((is_array($_tmp='UserSettings_Browsers')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTableBrowser']; ?>

	
	<h2><?php echo ((is_array($_tmp='UserSettings_Plugins')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTablePlugin']; ?>

</div>

<div id='rightcolumn'>
	<h2><?php echo ((is_array($_tmp='UserSettings_Configurations')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTableConfiguration']; ?>

	
	<h2><?php echo ((is_array($_tmp='UserSettings_OperatingSystems')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTableOS']; ?>

	
	<h2><?php echo ((is_array($_tmp='UserSettings_Resolutions')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTableResolution']; ?>

	
	<h2><?php echo ((is_array($_tmp='UserSettings_WideScreen')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h2>
	<?php echo $this->_tpl_vars['dataTableWideScreen']; ?>

</div>	




