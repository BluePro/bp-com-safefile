<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class SafeFileViewSafeFile extends JViewLegacy {

  public function display($tpl = null) {
    $this->addToolBar();
		parent::display($tpl);
  }

  private function addToolBar() {
		JToolBarHelper::title(JText::_('COM_SAFEFILE'));
		if (JFactory::getUser()->authorise('core.admin', 'com_safefile')) {
    	JToolBarHelper::preferences('com_safefile');
		}
  }

}
