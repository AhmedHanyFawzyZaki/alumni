<?php

/**
 * This is the model class for table "{{group_participant}}".
 *
 * The followings are the available columns in table '{{group_participant}}':
 * @property integer $group_participant_id
 * @property integer $group_id
 * @property integer $participant_id
 *
 * The followings are the available model relations:
 * @property User $participant
 * @property Group $group
 */
class GroupParticipant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{group_participant}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, participant_id', 'required'),
			array('group_id, participant_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_participant_id, group_id, participant_id', 'safe', 'on'=>'search'),
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
			'participant' => array(self::BELONGS_TO, 'User', 'participant_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_participant_id' => Yii::t('t','Group Participant'),
			'group_id' => Yii::t('t','Group'),
			'participant_id' => Yii::t('t','Participant'),
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

		$criteria->compare('group_participant_id',$this->group_participant_id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('participant_id',$this->participant_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GroupParticipant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
