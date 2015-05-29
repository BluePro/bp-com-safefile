<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');

if (!JFactory::getUser()->authorise('core.view', 'com_safefile')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller = JControllerLegacy::getInstance('SafeFile');
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
$controller->redirect();
