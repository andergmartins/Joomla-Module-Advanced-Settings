<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;


JFormHelper::loadFieldClass('groupedlist');

/**
 * Chrome Styles Form Field class for the Joomla Platform.
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       13.1
 */
class JFormFieldChromeStyles extends JFormFieldGroupedList
{
    /**
     * The form field type.
     *
     * @var    string
     * @since  13.1
     */
    protected $type = 'ChromeStyles';

    /**
     * Method to get the field options.
     *
     * @return  array  The field option objects.
     *
     * @since   13.1
     */
    protected function getGroups()
    {
        // Initialize variables.
        $groups = array();

        // Add Module Style Field
        $tmp = '---'.JText::_('PLG_MODADVANCEDSETTINGS_FROM_TEMPLATE').'---';
        $groups[$tmp][] = JHtml::_('select.option', '0', JText::_('PLG_MODADVANCEDSETTINGS_TEMPLATE_INHERITED'));

        $templateStyles = $this->getTemplateModuleStyles();

        // Create one new option object for each available style, grouped by templates
        foreach ($templateStyles as $template => $styles) {
            $template = ucfirst($template);
            $groups[$template] = array();

            foreach ($styles as $style) {
                $tmp = JHtml::_('select.option', $template.'-'.$style, $style);
                $groups[$template][] = $tmp;
            }
        }

        reset($groups);

        return $groups;
    }

    /**
     * Method to get the templates module styles.
     *
     * @return  array  The array of styles, grouped by templates.
     *
     * @since   13.1
     */
    protected function getTemplateModuleStyles()
    {
        $moduleStyles = array();

        $templates = array($this->getSystemTemplate());
        $templates = array_merge($templates, ModulesHelper::getTemplates('site'));

        foreach ($templates as $template) {
            $modulesFilePath = JPATH_SITE.DS.'templates'.DS.$template->element.DS.'html'.DS.'modules.php';

            // Is there modules.php for that template?
            if (file_exists($modulesFilePath)) {
                $modulesFileData = file_get_contents($modulesFilePath);

                preg_match_all('/function[\s\t]*modChrome\_([a-z0-9\-\_]*)[\s\t]*\(/i', $modulesFileData, $styles);

                if (!array_key_exists($template->element, $moduleStyles)) {
                    $moduleStyles[$template->element] = array();
                }

                $moduleStyles[$template->element] = $styles[1];
            }
        }

        return $moduleStyles;
    }

    /**
     * Method to get the system template as an object.
     *
     * @return  array  The object of system template.
     *
     * @since   13.1
     */
    protected function getSystemTemplate()
    {
        $template = new stdClass();
        $template->element = 'system';
        $template->name = 'system';
        $template->enabled = 1;

        return $template;
    }
}
