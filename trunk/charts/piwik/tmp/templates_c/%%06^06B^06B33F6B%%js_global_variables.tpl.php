<?php /* Smarty version 2.6.26, created on 2010-07-22 22:32:37
         compiled from CoreHome/templates/js_global_variables.tpl */ ?>
<script type="text/javascript">
	var piwik = <?php echo '{}'; ?>
;
	piwik.token_auth = "<?php echo $this->_tpl_vars['token_auth']; ?>
";
	piwik.piwik_url = "<?php echo $this->_tpl_vars['piwikUrl']; ?>
";
	<?php if (isset ( $this->_tpl_vars['idSite'] )): ?>piwik.idSite = "<?php echo $this->_tpl_vars['idSite']; ?>
";<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['siteName'] )): ?>piwik.siteName = "<?php echo $this->_tpl_vars['siteName']; ?>
";<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['siteMainUrl'] )): ?>piwik.siteMainUrl = "<?php echo $this->_tpl_vars['siteMainUrl']; ?>
";<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['period'] )): ?>piwik.period = "<?php echo $this->_tpl_vars['period']; ?>
";<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['date'] )): ?>piwik.currentDateString = "<?php echo $this->_tpl_vars['date']; ?>
";<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['minDateYear'] )): ?>piwik.minDateYear = <?php echo $this->_tpl_vars['minDateYear']; ?>
;<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['minDateMonth'] )): ?>piwik.minDateMonth = parseInt("<?php echo $this->_tpl_vars['minDateMonth']; ?>
", 10);<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['minDateDay'] )): ?>piwik.minDateDay = parseInt("<?php echo $this->_tpl_vars['minDateDay']; ?>
", 10);<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['maxDateYear'] )): ?>piwik.maxDateYear = <?php echo $this->_tpl_vars['maxDateYear']; ?>
;<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['maxDateMonth'] )): ?>piwik.maxDateMonth = parseInt("<?php echo $this->_tpl_vars['maxDateMonth']; ?>
", 10);<?php endif; ?>
	<?php if (isset ( $this->_tpl_vars['maxDateDay'] )): ?>piwik.maxDateDay = parseInt("<?php echo $this->_tpl_vars['maxDateDay']; ?>
", 10);<?php endif; ?>
</script>