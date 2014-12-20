<?php
/**
 * SpamReporterModule is responsible for allowing useres to report posts as spam.
 *
 * @author Marjana Pesic
 *
 */

class SpamReporterModule extends HWebModule
{

	// http://www.yiiframework.com/wiki/148/understanding-assets/
	// getAssetsUrl()
	// return the URL for this module's assets, performing the publish operation
	// the first time, and caching the result for subsequent use.
	private $_assetsUrl;
	public function getAssetsUrl()     {
		if ($this->_assetsUrl === null)
			$this->_assetsUrl = Yii::app()->getAssetManager()->publish(
					Yii::getPathOfAlias('spamreporter.assets')
			);
		return $this->_assetsUrl;
	}

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
	}

	public static function onWallEntryControlsInit($event) {

		$event->sender->addWidget('application.modules.spamreporter.widgets.ReportSpamWidget', array(
				'content' => $event->sender->object
		)
		);
	}

}
?>
