<?php

/**
 * NotificationSwitch for Wall Entries
 *
 * This widget allows turn on/off of notifications of a content.
 *
 * @package humhub.modules_core.wall.widgets
 * @since 0.10
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
	var_dump('usao'); die;
     /*   $this->render('reportSpamLink', array(
            'content' => $this->content,
            'state' => $this->content->isFollowedByUser(Yii::app()->user->id, true)
        ));*/
    }

}

?>