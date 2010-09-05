<?php /* Smarty version 2.6.26, created on 2010-07-22 22:32:38
         compiled from CoreHome/templates/piwik_tag.tpl */ ?>
<?php if ($this->_tpl_vars['piwikUrl'] == 'http://piwik.org/demo/' || $this->_tpl_vars['debugTrackVisitsInsidePiwikUI']): ?>
<div class="clear"></div>
<?php echo '
<!-- Piwik -->
<script src="piwik.js" type="text/javascript"></script>
<script type="text/javascript">
try {
 var piwikTracker = Piwik.getTracker("piwik.php", 1);
 piwikTracker.setCustomData({ \'video_play\':1, \'video_finished\':0 });
 piwikTracker.trackPageView();
 piwikTracker.enableLinkTracking();
} catch(err) {}
</script>
<!-- End Piwik Tag -->
'; ?>

<?php endif; ?>