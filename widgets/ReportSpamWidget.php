<?php

/**
 * ReportSpamWidget for reporting a post
 *
 * This widget allows to report a post.
 *
 * @package humhub.modules.spamreporter.widgets
 */
class ReportSpamWidget extends HWidget
{

	/**
	 * Content Object with SIContentBehaviour
	 * @var type
	 */
	public $content;



	/**
	 * Executes the widget.
	 */
	public function run()
	{

		if(Report::canReportPost($this -> content -> id)) {
				
			$this->render('reportSpamLink', array(
					'object' => $this->content,
					'model' => new ReportReasonForm(),
			));
		}
	}

}

?>