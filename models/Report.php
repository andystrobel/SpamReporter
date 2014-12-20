<?php

/**
 * This is the model class for table "report".
 *
 * The followings are the available columns in table 'report':
 * @property integer $id
 * @property integer $post_id
 * @property integer $reason
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @package humhub.modules.spamreporter.models
 */
class Report extends HActiveRecordContentAddon {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Report the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'report';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('post_id, reason, created_by', 'required'),
            array('post_id, created_by, updated_by', 'numerical', 'integerOnly' => true),
            array('created_at', 'length', 'max' => 45),
            array('updated_at', 'safe') 
        );
    }


    protected function afterSave() {

        // Send Notifications
    	NewReportNotification::fire($this);
    	NewReportAdminNotification::fire($this);
    	
    }
    
    public function getReason() {
    	return $this -> reason;
    }


}
