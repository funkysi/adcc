<?php /* Smarty version 2.6.25, created on 2010-01-11 00:21:04
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Login/templates/lostPassword.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Login/templates/lostPassword.tpl', 8, false),array('modifier', 'escape', '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Login/templates/lostPassword.tpl', 33, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Login/templates/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="login">

<?php if ($this->_tpl_vars['form_data']['errors']): ?>
<div id="login_error">	
	<?php $_from = $this->_tpl_vars['form_data']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<strong><?php echo ((is_array($_tmp='General_Error')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</strong>: <?php echo $this->_tpl_vars['data']; ?>
<br />
	<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['AccessErrorString']): ?>
<div id="login_error"><strong><?php echo ((is_array($_tmp='General_Error')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</strong>: <?php echo $this->_tpl_vars['AccessErrorString']; ?>
<br /></div>
<?php endif; ?>

<p class="message">
<?php echo ((is_array($_tmp='Login_PasswordReminder')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

</p>

<form <?php echo $this->_tpl_vars['form_data']['attributes']; ?>
>
	<p>
		<label><?php echo ((is_array($_tmp='Login_LoginOrEmail')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
:<br />
		<input type="text" name="form_login" id="form_login" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<?php echo $this->_tpl_vars['form_data']['form_url']['html']; ?>

	<p class="submit">
		<input type="submit" value="<?php echo ((is_array($_tmp='Login_RemindPassword')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" tabindex="100" />
	</p>
</form>

<p id="nav">
<a href="index.php?module=Login&amp;form_url=<?php echo ((is_array($_tmp=$this->_tpl_vars['urlToRedirect'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
" title="<?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
"><?php echo ((is_array($_tmp='Login_LogIn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
</p>

</div>

</body>
</html>