<?php /* Smarty version 2.6.25, created on 2010-01-10 21:39:04
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/API/templates/listAllAPI.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fetch', '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/API/templates/listAllAPI.tpl', 6, false),array('modifier', 'translate', '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/API/templates/listAllAPI.tpl', 9, false),)), $this); ?>
<?php $this->assign('showSitesSelection', true); ?>
<?php $this->assign('showPeriodSelection', false); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CoreAdminHome/templates/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<style>
<?php echo smarty_function_fetch(array('file' => "plugins/API/templates/styles.css"), $this);?>

</style>

<?php echo ((is_array($_tmp='API_QuickDocumentation')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['token_auth']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['token_auth'])); ?>

<span id='token_auth'>token_auth = <b><?php echo $this->_tpl_vars['token_auth']; ?>
</b></span>
<p><i><?php echo ((is_array($_tmp='API_LoadedAPIs')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['countLoadedAPI']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['countLoadedAPI'])); ?>
</i></p>
<?php echo $this->_tpl_vars['list_api_methods_with_links']; ?>
