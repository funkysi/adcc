<?php /* Smarty version 2.6.26, created on 2010-07-22 22:34:07
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Live/templates/index.tpl */ ?>
<?php echo '
<script type="text/javascript" charset="utf-8">

	$(document).ready(function() {
		if($(\'#_spyTmp\').size() == 0) {
			$(\'#visitsLive > div:gt(2)\').fadeEachDown(); // initial fade
			$(\'#visitsLive\').spy({
				limit: 10,
				ajax: \'index.php?module=Live&idSite='; ?>
<?php echo $this->_tpl_vars['idSite']; ?>
<?php echo '&action=getLastVisitsStart\',
				fadeLast: 2,
				isDupe: check_for_dupe,
				timeout: 8000,
				customParameterName: \'minIdVisit\',
				customParameterValueCallback: lastIdVisit,
				fadeInSpeed: 600
			});
		}
	});

	// first I\'m ensuring that \'last\' has been initialised (with last.constructor == Object),
	// then prev.html() == last.html() will return true if the HTML is the same, or false,
	// if I have a different entry.
	function check_for_dupe(prev, last)
	{
		if (last.constructor == Object)	{
			return (prev.html() == last.html());
		}
		else {
			return 0;
		}
	}

	function lastIdVisit()
	{
		updateTotalVisits();
		updateVisitBox();
		return $(\'#visitsLive > div:lt(2) .idvisit\').html();
	}

	var pauseImage = "plugins/Live/templates/images/pause.gif";
	var pauseDisabledImage = "plugins/Live/templates/images/pause_disabled.gif";
	var playImage = "plugins/Live/templates/images/play.gif";
	var playDisabledImage = "plugins/Live/templates/images/play_disabled.gif";

	function onClickPause()
	{
		$(\'#pauseImage\').attr(\'src\', pauseImage);
		$(\'#playImage\').attr(\'src\', playDisabledImage);
		return pauseSpy();
	}
	function onClickPlay()
	{
		$(\'#playImage\').attr(\'src\', playImage);
		$(\'#pauseImage\').attr(\'src\', pauseDisabledImage);
		return playSpy();
	}

	// updates the numbers of total visits in startbox
	function updateTotalVisits()
	{
		$("#visitsTotal").load("index.php?module=Live&idSite='; ?>
<?php echo $this->_tpl_vars['idSite']; ?>
<?php echo '&action=ajaxTotalVisitors");
	}

	// updates the visit table, to refresh the already presented visotors pages
	function updateVisitBox()
	{
		$("#visitsLive").load("index.php?module=Live&idSite='; ?>
<?php echo $this->_tpl_vars['idSite']; ?>
<?php echo '&action=getLastVisitsStart");
	}

	/* TOOLTIP */
		$(\'#visitsLive label\').tooltip({
		    track: true,
		    delay: 0,
		    showURL: false,
		    showBody: " - ",
		    fade: 250
		});

</script>

<style>
#visitsLive {
	text-align:left;
	font-size:90%;
}
#visitsLive .datetime, #visitsLive .country, #visitsLive .referer, #visitsLive .settings, #visitsLive .returning , #visitsLive .countActions{
	border-bottom:1px solid #C1DAD7;
	border-right:1px solid #C1DAD7;
	padding:5px 5px 5px 12px;
}

#visitsLive .datetime {
	background:#D4E3ED url(plugins/CoreHome/templates/images/bg_header.jpg) repeat-x scroll 0 0;
	border-top:1px solid #C1DAD7;
	color:#6D929B;
	margin:0;
	text-align:left;
}

#visitsLive .country {
	color:#4F6B72;
	background:#FFFFFF url(plugins/CoreHome/templates/images/bullet1.gif) no-repeat scroll 0 0;
}

#visitsLive .referer {
	background:#F9FAFA none repeat scroll 0 0;
	color:#797268;
}

#visitsLive .pagesTitle {
	display:block;
	float:left;
	padding-top: 3px;
}

#visitsLive .countActions {
	background:#FFFFFF none repeat scroll 0 0;
	color:#4F6B72;
}

#visitsLive .settings {
	background:#FFFFFF none repeat scroll 0 0;
	color:#4F6B72;
}

#visitsLive .returning {
	background:#F9FAFA none repeat scroll 0 0;
	color:#797268;
}

#visitsLive .visit {
}

#visitsLive .alt {
}

#visitsLive .actions {
	background:#F9FAFA none repeat scroll 0 0;
	color:#797268;
	padding:0px 5px 0px 12px;
}

</style>
'; ?>


<div id="visitsTotal">
	<table class="dataTable" cellspacing="0">
	<thead>
	<tr>
	<th id="label" class="sortable label" style="cursor: auto;">
	<div id="thDIV">Period<div></th>
	<th id="label" class="sortable label" style="cursor: auto;">
	<div id="thDIV">Visits<div></th>
	<th id="label" class="sortable label" style="cursor: auto;">
	<div id="thDIV">PageViews<div></th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<tr class="">
	<td class="columnodd">Today</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['visitorsCountToday']; ?>
</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['pisToday']; ?>
</td>
	</tr>
	<tr class="">
	<td class="columnodd">Last 30 minutes</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['visitorsCountHalfHour']; ?>
</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['pisHalfhour']; ?>
</td>
	</tr>
	</tbody>
	</table>
</div>

<div id='visitsLive'>
<?php echo $this->_tpl_vars['visitors']; ?>

</div>

<div>
	<a href="javascript:void(0);" onclick="onClickPause();"><img id="pauseImage" border="0" src="plugins/Live/templates/images/pause_disabled.gif" /></a>
	<a href="javascript:void(0);" onclick="onClickPlay();"><img id="playImage" border="0" src="plugins/Live/templates/images/play.gif" /></a>
</div>