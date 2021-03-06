<?php
/**
 * Piwik - Open source web analytics
 * 
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html Gpl v3 or later
 * @version $Id: LanguagesManager.php 2409 2010-07-01 11:02:03Z matt $
 * 
 * @category Piwik_Plugins
 * @package Piwik_LanguagesManager
 * 
 */

/**
 *
 * @package Piwik_LanguagesManager
 */
class Piwik_LanguagesManager extends Piwik_Plugin
{
	public function getInformation()
	{
		return array(
			'description' => Piwik_Translate('LanguagesManager_PluginDescription'),
			'author' => 'Piwik',
			'author_homepage' => 'http://piwik.org/',
			'version' => Piwik_Version::VERSION,
		);
	}

	public function getListHooksRegistered()
	{
		return array( 
			'AssetManager.getCssFiles' => 'getCssFiles',
			'TopMenu.add' => 'showLanguagesSelector',
			'Translate.getLanguageToLoad' => 'getLanguageToLoad',
			'UsersManager.deleteUser' => 'deleteUserLanguage',
		);
	}
	
	function getCssFiles( $notification )
	{
		$cssFiles = &$notification->getNotificationObject();
		
		$cssFiles[] = "themes/default/styles.css";
	}	

	/**
	 * Show styled language selection drop-down list
	 *
	 * @param string $url The form action.  Default is to save language.
	 */
	function showLanguagesSelector()
	{
		// don't use Piwik_View::factory() here
		$view = new Piwik_View("LanguagesManager/templates/languages.tpl"); 
		$view->languages = Piwik_LanguagesManager_API::getInstance()->getAvailableLanguageNames();
		$view->currentLanguageCode = self::getLanguageCodeForCurrentUser();
		$view->currentLanguageName = self::getLanguageNameForCurrentUser();
		Piwik_AddTopMenu('LanguageSelector', $view->render(), true, 20, true);
	}
	
	function getLanguageToLoad($notification)
	{
		$language =& $notification->getNotificationObject();
		$language = self::getLanguageCodeForCurrentUser();
	}

	function deleteUserLanguage($notification)
	{
		$userLogin = $notification->getNotificationObject();
		Piwik_Query('DELETE FROM ' . Piwik_Common::prefixTable('user_language') . ' WHERE login = ?', $userLogin);
	}

	/**
	 * @throws Exception if non-recoverable error
	 */
	public function install()
	{
		// we catch the exception
		try{
			$sql = "CREATE TABLE ". Piwik_Common::prefixTable('user_language')." (
					login VARCHAR( 100 ) NOT NULL ,
					language VARCHAR( 10 ) NOT NULL ,
					PRIMARY KEY ( login )
					)  DEFAULT CHARSET=utf8 " ;
			Piwik_Exec($sql);
		} catch(Exception $e){
			// mysql code error 1050:table already exists
			// see bug #153 http://dev.piwik.org/trac/ticket/153
			if(!Zend_Registry::get('db')->isErrNo($e, '1050'))
			{
				throw $e;
			}
		}
	}
	
	/**
	 * @throws Exception if non-recoverable error
	 */
	public function uninstall()
	{
		$sql = "DROP TABLE ". Piwik_Common::prefixTable('user_language') ;
		Piwik_Exec($sql);		
	}

	/**
	 * @return string Two letters language code, eg. "fr"
	 */
	static public function getLanguageCodeForCurrentUser()
	{
		$languageCode = self::getLanguageFromPreferences();
		if(!Piwik_LanguagesManager_API::getInstance()->isLanguageAvailable($languageCode))
		{
			$languageCode = Piwik_Common::extractLanguageCodeFromBrowserLanguage(Piwik_Common::getBrowserLanguage(), Piwik_LanguagesManager_API::getInstance()->getAvailableLanguages());
		}
		if(!Piwik_LanguagesManager_API::getInstance()->isLanguageAvailable($languageCode))
		{
			$languageCode = 'en';
		}
		return $languageCode;
	}
	
	/**
	 * @return string Full english language string, eg. "French"
	 */
	static public function getLanguageNameForCurrentUser()
	{
		$languageCode = self::getLanguageCodeForCurrentUser();
		$languages = Piwik_LanguagesManager_API::getInstance()->getAvailableLanguageNames();
		foreach($languages as $language)
		{
			if($language['code'] === $languageCode) 
			{
				return $language['name'];
			}
		}
	}

	/**
	 * @return string|false if language preference could not be loaded
	 */
	static protected function getLanguageFromPreferences()
	{
		if(($language = Piwik_LanguagesManager_API::getInstance()->getLanguageForSession()) != null)
		{
			return $language;
		}
		
		try {
			$currentUser = Piwik::getCurrentUserLogin();
			return Piwik_LanguagesManager_API::getInstance()->getLanguageForUser($currentUser);
		} catch(Exception $e) {
			return false;
		}
	}
}
