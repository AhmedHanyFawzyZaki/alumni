<?php

/**
 * This is the model class for table "{{group}}".
 *
 * The followings are the available columns in table '{{group}}':
 * @property integer $group_id
 * @property string $group_name
 * @property integer $created_by
 * @property string $description
 * @property string $date_created
 * @property string $image
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property GroupChat[] $groupChats
 * @property GroupParticipant[] $groupParticipants
 */
class Group extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{group}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('group_name, created_by', 'required'),
            array('created_by', 'numerical', 'integerOnly' => true),
            array('group_name, image', 'length', 'max' => 255),
            array('description, date_created', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('group_id, group_name, created_by, description, date_created, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
            'groupChats' => array(self::HAS_MANY, 'GroupChat', 'group_id'),
            'groupParticipants' => array(self::HAS_MANY, 'GroupParticipant', 'group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'group_id' => Yii::t('t', 'Group'),
            'group_name' => Yii::t('t', 'Group Name'),
            'created_by' => Yii::t('t', 'Created By'),
            'description' => Yii::t('t', 'Description'),
            'date_created' => Yii::t('t', 'Date Created'),
            'image' => Yii::t('t', 'Image'),
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('Lower(group_name)', strtolower($this->group_name), true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('Lower(description)', strtolower($this->description), true);
        $criteria->compare('Lower(date_created)', strtolower($this->date_created), true);
        $criteria->compare('Lower(image)', strtolower($this->image), true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Group the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->image == '') {
                $this->image = 'group.png';
            }

            return true;
        }
        return false;
    }

}
