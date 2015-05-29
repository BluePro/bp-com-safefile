<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class SafeFileViewSafeFile extends JViewLegacy {

  public function display($tpl = null) {
    $app = JFactory::getApplication();
		$file = $app->input->getCmd('file');
		$filePath = JPATH_ROOT . '/images/dokumenty/safe/' . $file;

    if (!JFile::exists($filePath)) {
			$app->enqueueMessage('Unknown file', 'error');
      JLog::add('Unknown file', JLog::WARNING, 'jerror');
      return false;
    }

		$fileInfo = new finfo(FILEINFO_MIME_TYPE);
		$mime = $fileInfo->file($filePath);
		$fileName = JFile::getName($filePath);

		JResponse::clearHeaders();
		JResponse::setHeader('Content-Type', $mime, true);
		JResponse::setHeader('Content-Disposition','attachment;filename="' . $fileName .'"');
		JResponse::sendHeaders();

		echo JFile::read($filePath);
  }

}
