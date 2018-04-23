<?php

/**
 * This is the model class for table "{{group_chat}}".
 *
 * The followings are the available columns in table '{{group_chat}}':
 * @property integer $group_chat_id
 * @property integer $group_id
 * @property integer $user_id
 * @property string $msg
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Group $group
 */
class GroupChat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{group_chat}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, user_id, msg, date_created', 'required'),
			array('group_id, user_id', 'numerical', 'integerOnly'=>true),
			array('msg', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_chat_id, group_id, user_id, msg, date_created', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_chat_id' => Yii::t('t','Group Chat'),
			'group_id' => Yii::t('t','Group'),
			'user_id' => Yii::t('t','User'),
			'msg' => Yii::t('t','Msg'),
			'date_created' => Yii::t('t','Date Created'),
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

		$criteria->compare('group_chat_id',$this->group_chat_id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('Lower(msg)',strtolower($this->msg),true);
		$criteria->compare('Lower(date_created)',strtolower($this->date_created),true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GroupChat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
