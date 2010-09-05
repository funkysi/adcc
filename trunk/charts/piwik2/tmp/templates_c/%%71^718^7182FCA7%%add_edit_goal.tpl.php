<?php /* Smarty version 2.6.25, created on 2010-01-19 20:19:16
         compiled from Goals/templates/add_edit_goal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'Goals/templates/add_edit_goal.tpl', 12, false),)), $this); ?>

<div id="AddEditGoals">
<?php if (isset ( $this->_tpl_vars['onlyShowAddNewGoal'] )): ?>
	<h2>Add a new Goal</h2>
<?php else: ?>
	<h2><a onclick='' name="linkAddNewGoal">+ Add a new Goal</a> 
	or <a onclick='' name="linkEditGoals">Edit</a> existing Goals</h2>
<?php endif; ?>

	<div>
	<div id="ajaxError" style="display:none"></div>
	<div id="ajaxLoading" style="display:none"><div id="loadingPiwik"><img src="themes/default/images/loading-blue.gif" alt="" /> <?php echo ((is_array($_tmp='General_LoadingData')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</div></div>
	</div>
	
<?php if (! isset ( $this->_tpl_vars['onlyShowAddNewGoal'] )): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Goals/templates/list_goal_edit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Goals/templates/form_add_goal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<a id='bottom'></a>
</div>

<?php echo '
<script type="text/javascript" src="plugins/Goals/templates/GoalForm.js"></script>
<script language="javascript">

var mappingMatchTypeName = { 
	"url": "URL", 
	"file": "filename", 
	"external_website": "external website URL" 
};
var mappingMatchTypeExamples = { 
	"url": "eg. contains \'checkout/confirmation\'<br>eg. is exactly \'http://example.com/thank-you.html\'<br>eg. matches the expression \'(.*)\\\\\\/demo\\\\\\/(.*)\'", 
	"file": "eg. contains \'files/brochure.pdf\'<br>eg. is exactly \'http://example.com/files/brochure.pdf\'<br>eg. matches the expression \'(.*)\\\\\\.zip\'", 
	"external_website": "eg. contains \'amazon.com\'<br>eg. is exactly \'http://mypartner.com/landing.html\'<br>eg. matches the expression \'http://www.amazon.com\\\\\\/(.*)\\\\\\/yourAffiliateId\'" 
};

bindGoalForm();

'; ?>


<?php if (! isset ( $this->_tpl_vars['onlyShowAddNewGoal'] )): ?>
piwik.goals = <?php echo $this->_tpl_vars['goalsJSON']; ?>
;
bindListGoalEdit();
<?php else: ?>
initAndShowAddGoalForm();
<?php endif; ?>

</script>