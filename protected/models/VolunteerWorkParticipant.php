<?php

/**
 * This is the model class for table "{{volunteer_work_participant}}".
 *
 * The followings are the available columns in table '{{volunteer_work_participant}}':
 * @property integer $volunteer_work_participant_id
 * @property integer $volunteer_work_id
 * @property integer $participant_id
 * @property integer $participant_status
 *
 * The followings are the available model relations:
 * @property ParticipationStatus $participantStatus
 * @property User $participant
 * @property VolunteerWork $volunteerWork
 */
class VolunteerWorkParticipant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{volunteer_work_participant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('volunteer_work_id, participant_id, participant_status', 'required'),
			array('volunteer_work_id, participant_id, participant_status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('volunteer_work_participant_id, volunteer_work_id, participant_id, participant_status', 'safe', 'on'=>'search'),
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
			'participantStatus' => array(self::BELONGS_TO, 'ParticipationStatus', 'participant_status'),
			'participant' => array(self::BELONGS_TO, 'User', 'participant_id'),
			'volunteerWork' => array(self::BELONGS_TO, 'VolunteerWork', 'volunteer_work_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'volunteer_work_participant_id' => Yii::t('t','Volunteer Work Participant'),
			'volunteer_work_id' => Yii::t('t','Volunteer Work'),
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

		$criteria->compare('volunteer_work_participant_id',$this->volunteer_work_participant_id);
		$criteria->compare('volunteer_work_id',$this->volunteer_work_id);
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
	 * @return VolunteerWorkParticipant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
