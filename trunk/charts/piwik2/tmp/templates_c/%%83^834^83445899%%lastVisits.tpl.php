<?php /* Smarty version 2.6.25, created on 2010-01-10 11:05:17
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Live/templates/lastVisits.tpl */ ?>
<?php $_from = $this->_tpl_vars['visitors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['visitor']):
?>
	<div class="visit<?php if ($this->_tpl_vars['visitor']['idVisit'] % 2): ?> alt<?php endif; ?>">
		<!--<div class="idvisit"><?php echo $this->_tpl_vars['visitor']['idVisit']; ?>
</div>-->
		<div style="display:none" class="idvisit"><?php echo $this->_tpl_vars['visitor']['idVisit']; ?>
</div>
	
			<div class="datetime">
				<?php echo $this->_tpl_vars['visitor']['serverDatePretty']; ?>
 - <?php echo $this->_tpl_vars['visitor']['serverTimePretty']; ?>

				&nbsp;<img src="<?php echo $this->_tpl_vars['visitor']['countryFlag']; ?>
" title="<?php echo $this->_tpl_vars['visitor']['country']; ?>
, Provider <?php echo $this->_tpl_vars['visitor']['provider']; ?>
">
				&nbsp;<img src="<?php echo $this->_tpl_vars['visitor']['browserIcon']; ?>
" title="<?php echo $this->_tpl_vars['visitor']['browser']; ?>
 with plugins <?php echo $this->_tpl_vars['visitor']['plugins']; ?>
 enabled">
				&nbsp;<img src="<?php echo $this->_tpl_vars['visitor']['operatingSystemIcon']; ?>
" title="<?php echo $this->_tpl_vars['visitor']['operatingSystem']; ?>
, <?php echo $this->_tpl_vars['visitor']['resolution']; ?>
">		
			</div>
			<div class="settings">
				<?php echo $this->_tpl_vars['visitor']['ip']; ?>
 
				<?php if ($this->_tpl_vars['visitor']['isVisitorReturning']): ?><img src="plugins/Live/templates/images/returningVisitor.gif" title="Returning Visitor"><?php endif; ?>
			</div>
			<div class="referer">
				<?php if ($this->_tpl_vars['visitor']['refererType'] != 'directEntry'): ?>from <a href="<?php echo $this->_tpl_vars['visitor']['refererUrl']; ?>
"><img src="<?php echo $this->_tpl_vars['visitor']['searchEngineIcon']; ?>
"> <?php echo $this->_tpl_vars['visitor']['refererName']; ?>
</a> 
					<?php if (! empty ( $this->_tpl_vars['visitor']['keywords'] )): ?>"<?php echo $this->_tpl_vars['visitor']['keywords']; ?>
"<?php endif; ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['visitor']['refererType'] == 'directEntry'): ?>Direct entry<?php endif; ?>
			</div>
		<div id="<?php echo $this->_tpl_vars['visitor']['idVisit']; ?>
_actions" class="actions">
			<span class="pagesTitle">Pages:</span>&nbsp;
			<?php  $col = 0;	 ?>
			<?php $_from = $this->_tpl_vars['visitor']['actionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
			  <?php  
			  	$col++; 
		  		if ($col>=9)
		  		{
				  $col=0;
		  		}
				 ?>	
				<a href="<?php echo $this->_tpl_vars['action']['pageUrl']; ?>
" target="_blank"><img align="middle" src="plugins/Live/templates/images/file<?php  echo $col;  ?>.png" title="<?php echo $this->_tpl_vars['action']['pageUrl']; ?>
"></a>
			<?php endforeach; endif; unset($_from); ?>
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>