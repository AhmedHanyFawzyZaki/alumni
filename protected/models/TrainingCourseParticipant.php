<?php

/**
 * This is the model class for table "{{training_course_participant}}".
 *
 * The followings are the available columns in table '{{training_course_participant}}':
 * @property integer $training_course_participant_id
 * @property integer $training_course_id
 * @property integer $participant_id
 * @property integer $participant_status
 *
 * The followings are the available model relations:
 * @property ParticipationStatus $participantStatus
 * @property TrainingCourse $trainingCourse
 * @property User $participant
 */
class TrainingCourseParticipant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{training_course_participant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('training_course_id, participant_id, participant_status', 'required'),
			array('training_course_id, participant_id, participant_status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('training_course_participant_id, training_course_id, participant_id, participant_status', 'safe', 'on'=>'search'),
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
			'trainingCourse' => array(self::BELONGS_TO, 'TrainingCourse', 'training_course_id'),
			'participant' => array(self::BELONGS_TO, 'User', 'participant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'training_course_participant_id' => Yii::t('t','Training Course Participant'),
			'training_course_id' => Yii::t('t','Training Course'),
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

		$criteria->compare('training_course_participant_id',$this->training_course_participant_id);
		$criteria->compare('training_course_id',$this->training_course_id);
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
	 * @return TrainingCourseParticipant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
