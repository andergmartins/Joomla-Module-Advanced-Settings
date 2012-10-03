<?php
/**
 * @version     %%VERSION%%
 * @author      Paulo Griiettner/Anderson G. Martins <andergmartins@gmail.com>
 * @copyright   Copyright (c) 2012 Paulo Griietter/Anderson G. Martins. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport( 'joomla.plugin.plugin' );

// Load modified JDocumentRendererModule before the Joomla Framework doest it, to ignore that
// Works with Joomla 2.5.7 too.
require_once JPATH_SITE.DS.'plugins'.DS.'system'.DS.'modadvancedsettings'.DS.'class'.DS.'jmodulehelper-2.5.6.php';


/**
 * Module Advanced Settings plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.modadvancedsettings
 */

class plgSystemModadvancedsettings extends JPlugin {

}
