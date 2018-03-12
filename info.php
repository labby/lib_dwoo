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

$module_directory     = 'lib_dwoo';
$module_name          = 'Dwoo Library for LEPTON';
$module_function      = 'library';
$module_version       = '1.3.6.0';
$module_platform      = '2.x';
$module_author        = 'Dwoo/David Sanchez, LEPTON team';
$module_license       = 'GNU General Public License';
$module_description   = 'Dwoo PHP Template Engine';
$module_home          = 'http://dwoo.org/';
$module_guid          = '0266338D-DC1E-4815-B308-F9A6CB84448C';

?>
