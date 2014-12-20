<?php

/**
 * Notifies a user that someone has reported his post
 *
 * @package humhub.modules.spamreporter.notifications
 */
class NewReportNotification extends Notification
{

    public $webView = "spamreporter.views.notifications.newReport";
    public $mailView = "application.modules.spamreporter.views.notifications.newReporter_mail";

    /**
     * Fires this notification
     *
     * @param type $report
     */
    public static function fire($report)
    {
    	
            $notification = new Notification();
            $notification->class = "NewReportNotification";
            $notification->user_id = $report->content->getUnderlyingObject()-> created_by;

            if ($report->content->container instanceof Space) {
                $notification->space_id = $report->content->space_id;
            }

            $notification->source_object_model = "Report";
            $notification->source_object_id = $report->id;

            $notification->target_object_model = $report->object_model;
            $notification->target_object_id = $report->object_id;

            $notification->save();
	}

}

?>
