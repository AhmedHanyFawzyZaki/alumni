<?php

/**
 * This is the model class for table "{{event_participant}}".
 *
 * The followings are the available columns in table '{{event_participant}}':
 * @property integer $event_participant_id
 * @property integer $event_id
 * @property integer $participant_id
 * @property integer $participant_status
 *
 * The followings are the available model relations:
 * @property Event $event
 * @property ParticipationStatus $participantStatus
 * @property User $participant
 */
class EventParticipant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{event_participant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, participant_id, participant_status', 'required'),
			array('event_id, participant_id, participant_status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('event_participant_id, event_id, participant_id, participant_status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'participantStatus' => array(self::BELONGS_TO, 'ParticipationStatus', 'participant_status'),
			'participant' => array(self::BELONGS_TO, 'User', 'participant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_participant_id' => Yii::t('t','Event Participant'),
			'event_id' => Yii::t('t','Event'),
			'participant_id' => Yii::t('t','Participant'),
			'participant_status' => Yii::t('t','Participant Status'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('event_participant_id',$this->event_participant_id);
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('participant_id',$this->participant_id);
		$criteria->compare('participant_status',$this->participant_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventParticipant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
