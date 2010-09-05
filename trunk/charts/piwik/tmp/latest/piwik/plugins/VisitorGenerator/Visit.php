<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html Gpl v3 or later
 * @version $Id: Visit.php 2245 2010-05-31 10:30:02Z matt $
 * 
 * @category Piwik_Plugin
 * @package Piwik_VisitorGenerator
 */

/**
 * Fake Piwik_Tracker_Visit class that overwrite all the Time related method to be able
 * to setup a given timestamp for the generated visitor and actions.
 * 
 * @package Piwik_VisitorGenerator
 */
class Piwik_VisitorGenerator_Visit extends Piwik_Tracker_Visit
{
	static protected $timestampToUse;
	
	static public function setTimestampToUse($time)
	{
		self::$timestampToUse = $time;
	}
	protected function getCurrentDate( $format = "Y-m-d")
	{
		return date($format, $this->getCurrentTimestamp() );
	}
	
	protected function getCurrentTimestamp()
	{
		return self::$timestampToUse;
	}
	
	public function generateTimestamp()
	{
		self::$timestampToUse = max(@$this->visitorInfo['visit_last_action_time'],self::$timestampToUse);
		self::$timestampToUse += mt_rand(4,1840);
	}		
	
	protected function updateCookie()
	{
		@parent::updateCookie();
	}	
}
