{if $piwikUrl == 'http://piwik.org/demo/' || $debugTrackVisitsInsidePiwikUI}
<div class="clear"></div>
{literal}
<!-- Piwik -->
<script src="piwik.js" type="text/javascript"></script>
<script type="text/javascript">
try {
 var piwikTracker = Piwik.getTracker("piwik.php", 1);
 piwikTracker.setCustomData({ 'video_play':1, 'video_finished':0 });
 piwikTracker.trackPageView();
 piwikTracker.enableLinkTracking();
} catch(err) {}
</script>
<!-- End Piwik Tag -->
{/literal}
{/if}
