<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html Gpl v3 or later
 * @version $Id: modifier.inlineHelp.php 2604 2010-07-21 08:00:17Z matt $
 * 
 * @category Piwik
 * @package SmartyPlugins
 */

/**
 * Displays inline help using the jquery UI CSS
 */
function smarty_modifier_inlineHelp($text)
{
	return 
		'<div class="ui-widget">'.
			'<div class="ui-inline-help ui-state-highlight ui-corner-all">'.
				'<span class="ui-icon ui-icon-info" style="float:left;margin-right:.3em;"></span>'.
				$text.
			'</div>'.
		'</div>';
}
