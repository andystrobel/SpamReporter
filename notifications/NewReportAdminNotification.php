<?php

/**
 * Notifies an admin that someone has reported post
 *
 * @package humhub.modules.spamreporter.notifications
 */
class NewReportAdminNotification extends Notification
{

	public $webView = "spamreporter.views.notifications.newReportAdmin";
	public $mailView = "application.modules.spamreporter.views.notifications.newReportAdmin_mail";

	/**
	 * Fires this notification
	 *
	 * @param type $report
	 */
	public static function fire($report)
	{
		//if post belongs to the space report to space admin
		if ($report->content->container instanceof Space) {

			$notification = new Notification();
			$notification->class = "NewReportAdminNotification";

			$notification->user_id = $report->content->getContainer()-> created_by; //space admin
			$notification->space_id = $report->content->space_id;

			$notification->source_object_model = "Report";
			$notification->source_object_id = $report->id;

			$notification->target_object_model = $report->object_model;
			$notification->target_object_id = $report->object_id;

			$notification->save();
		}

		//if profile post report post to all super admins.
		if($report->content->container instanceof User){
			$users = User::model ()->findAll('super_admin = 1');
			foreach($users as $super_admin){

				$notification = new Notification();
				$notification->class = "NewReportAdminNotification";

				$notification -> user_id = $super_admin->id;

				$notification->source_object_model = "Report";
				$notification->source_object_id = $report->id;

				$notification->target_object_model = $report->object_model;
				$notification->target_object_id = $report->object_id;

				$notification->save();
			}
		}

		 
	}

}

?>
