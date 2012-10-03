Joomla-Module-Advanced-Settings
===============================

Plugins to add Joomla 3.0 advanced options to Joomla 2.5 modules.
Thanks Paulo Griiettner for the idea...

Installation
------------
- Install the pkg_modadvancedsettings_x.x.x.zip
- Enable the installed plugins
	- system -> modadvancedsettings
	- content -> modadvancedsettings
- Update your template, adding new html5 (or others) chrome style
- Configure the modules you want

Settings Available
------------------

- **module_tag**: Change the module's html tag
- **bootstrap_size**: When using Twitter Bootstrap, you can specify how many columns should use
- **header_tag**: Change the header tag
- **header_class**: Change the header css class
- **module_style**: Change the module chrome style, overriding what was specified in template

Updating your Joomla Template
---------------------------

To use the advanced settings, update the *\_yourtemplate_path_/html/modules.php* file, adding this chrome style:

	function modChrome_html5($module, &$params, &$attribs)
	{
		$moduleTag      = $params->get('module_tag', 'div');
		$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
		$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
		$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

		if (!empty ($module->content)) : ?>
			<<?php echo $moduleTag; ?> class="moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?><?php echo $moduleClass; ?>">

			<?php if ((bool) $module->showtitle) :?>
				<<?php echo $headerTag; ?> class="<?php echo $params->get('header_class'); ?>"><?php echo $module->title; ?></<?php echo $headerTag; ?>>
			<?php endif; ?>

				<?php echo $module->content; ?>

			</<?php echo $moduleTag; ?>>

		<?php endif;
	}

The plugin will automaticaly detect that change into any template and show it into params.

Joomla's Overridden Class
-------------------------
To be able to use this plugin, we added an override for the native **JModuleHelper** class. The original class inside Joomla's library folder
is not touched. So **you can update your Joomla without problem**. If these plugins stop to work after a future Joomla Update, we just need to add
a new modified class to override it for the new version.
