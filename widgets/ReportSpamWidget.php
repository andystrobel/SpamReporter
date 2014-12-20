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
		 
		Yii::import('spamreporter.forms.*');

		// Render widget if current user is not admin
		// if post is not created by current user 
		// if current user is not creator of the space where post belongs
		// if current user haven't already reported post
	
		if(!Yii::app()-> user-> isAdmin() && $this -> content -> created_by != Yii::app()-> user -> id &&
				!($this->content->content-> getContainer() instanceof Space && $this -> content -> content ->getContainer() -> created_by == Yii::app()-> user -> id)
				&& !Report::model() -> exists('object_model = "Post" and object_id = '.$this-> content->id.' and created_by = '.Yii::app()-> user-> id)){
			
			$this->render('reportSpamLink', array(
					'object' => $this->content,
					'model' => new ReportReasonForm(),
			));
		}
	}

}

?>