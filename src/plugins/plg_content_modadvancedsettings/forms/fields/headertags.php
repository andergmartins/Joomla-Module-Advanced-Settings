<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Form
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Form Field class for the Joomla Platform.
 * Implements a list with HTML tags for headers
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @since       13.1
 */
class JFormFieldHeaderTags extends JFormFieldList
{
    /**
     * The form field type.
     *
     * @var    string
     * @since  13.1
     */
    protected $type = 'HeaderTags';

    /**
     * Method to get the field options.
     *
     * @return  array  The field option objects.
     *
     * @since   13.1
     */
    protected function getOptions()
    {
        // Initialize variables.
        $options = array();
        $tags = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p');

        // Empty option
        $tmp = JHtml::_('select.option', '', JText::_('PLG_MODADVANCEDSETTINGS_FROM_TEMPLATE'));
        $options[] = $tmp;

        // Create one new option object for each tag
        foreach ($tags as $tag)
        {
            $tmp = JHtml::_('select.option', $tag, $tag);
            $options[] = $tmp;
        }

        reset($options);

        return $options;
    }
}
