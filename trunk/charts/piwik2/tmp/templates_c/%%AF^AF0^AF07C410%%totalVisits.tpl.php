<?php /* Smarty version 2.6.25, created on 2010-01-10 11:06:43
         compiled from /usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/charts/piwik/plugins/Live/templates/totalVisits.tpl */ ?>
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
	<thead>
	<tr>
	<tr class="subDataTable">
	<td class="columnodd">Today</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['visitorsCountToday']; ?>
</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['pisToday']; ?>
</td>
	</tr>
	<tr class="subDataTable">
	<td class="columnodd">Last 30 minutes</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['visitorsCountHalfHour']; ?>
</td>
	<td class="columnodd"><?php echo $this->_tpl_vars['pisHalfhour']; ?>
</td>
	</tr>
	</table>
</div>