<?php

/**
 * @module          Dwoo Template Engine
 * @author          LEPTON Project
 * @copyright       2010-2018 LEPTON Project
 * @link            http://www.lepton-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see info.php of this module
 * @platform		see info.php of this module
 */
 

// include class.secure.php to protect this file and the whole CMS!
if (defined('LEPTON_PATH')) {	
	include(LEPTON_PATH.'/framework/class.secure.php'); 
} else {
	$oneback = "../";
	$root = $oneback;
	$level = 1;
	while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
		$root .= $oneback;
		$level += 1;
	}
	if (file_exists($root.'/framework/class.secure.php')) { 
		include($root.'/framework/class.secure.php'); 
	} else {
		trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
	}
}
// end include class.secure.php

include(LEPTON_PATH.'/modules/'.basename(dirname(__FILE__)).'/dwoo/dwooAutoload.php');

$cache_path = LEPTON_PATH.'/temp/cache';
if (!file_exists($cache_path)) mkdir($cache_path, 0755, true);
$compiled_path = LEPTON_PATH.'/temp/compiled';
if (!file_exists($compiled_path)) mkdir($compiled_path, 0755, true);

global $parser,
       $HEADING,
       $TEXT,
       $MESSAGE,
       $MENU;

if (!is_object($parser))
{
  include LEPTON_PATH.'/modules/'.basename(dirname(__FILE__)).'/dwoo/LepDwoo.php';
  $parser = new LepDwoo($compiled_path, $cache_path);
  foreach ( array( 'TEXT', 'HEADING', 'MESSAGE', 'MENU' ) as $global ) {
      if ( isset(${$global}) && is_array(${$global}) ) {
          $parser->setGlobals( $global, ${$global} );
      }
  }
  $parser->setGlobals(
      array(
          'ADMIN_URL' => ADMIN_URL,
        	'LEPTON_URL' => LEPTON_URL,
        	'LEPTON_PATH' => LEPTON_PATH,
        	'THEME_URL' => THEME_URL,
        	'URL_HELP' => 'http://www.lepton-cms.org/'
      )
  );
}

?>