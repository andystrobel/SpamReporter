<?php

Yii::app()->moduleManager->register(array(
    'id' => 'spamreporter',
    'class' => 'application.modules.spamreporter.SpamReporterModule',
    'import' => array(
        'application.modules.spamreporter.*',
    ),
    // Events to Catch 
    'events' => array(
		//array('class' => 'WallEntryControlsWidget', 'event' => 'onInit', 'callback' => array('SpamReporterModule', 'onWallEntryControlsInit')),
        //array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('BirthdayModule', 'onSidebarInit')),
    ),
));
?>
