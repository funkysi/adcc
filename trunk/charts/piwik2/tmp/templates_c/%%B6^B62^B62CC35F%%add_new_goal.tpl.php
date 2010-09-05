<?php /* Smarty version 2.6.25, created on 2010-01-19 20:19:16
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Goals/templates/add_new_goal.tpl */ ?>

<?php if ($this->_tpl_vars['userCanEditGoals']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Goals/templates/add_edit_goal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
Only an Administrator or the Super User can add Goals for a given website. 
Please ask your Piwik administrator to set up a Goal for your website.
<br>Tracking Goals are a great tool to help you maximize your website performance!
<?php endif; ?>