<?php

Yii::app()->moduleManager->register(array(
    'id' => 'spamreporter',
    'class' => 'application.modules.spamreporter.SpamReporterModule',
    'import' => array(
        'application.modules.spamreporter.*',
		'application.modules.spamreporter.models.*',
		'application.modules.spamreporter.notifications.*',
    ),
    // Events to Catch 
    'events' => array(
		array('class' => 'WallEntryControlsWidget', 'event' => 'onInit', 'callback' => array('SpamReporterModule', 'onWallEntryControlsInit')),
    ),
));
?>
