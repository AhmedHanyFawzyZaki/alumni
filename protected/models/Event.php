<?php

/**
 * This is the model class for table "{{event}}".
 *
 * The followings are the available columns in table '{{event}}':
 * @property integer $event_id
 * @property string $event_name
 * @property string $description
 * @property string $event_url
 * @property string $date_start
 * @property string $date_end
 * @property integer $created_by
 * @property string $image
 * @property string $place
 * @property integer $active
 * @property string $date_created
 * @property string $event_name_ar
 * @property string $description_ar
 * @property string $place_ar
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property EventParticipant[] $eventParticipants
 */
class Event extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{event}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('event_name, description', 'required'),
            array('event_url', 'unique'),
            array('created_by, active', 'numerical', 'integerOnly' => true),
            array('event_name, event_url, image, place, event_name_ar, place_ar', 'length', 'max' => 255),
            array('date_start, date_end, date_created, description_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('event_id, event_name, description, event_url, date_start, date_end, created_by, image, place, active, date_created, event_name_ar, description_ar, place_ar', 'safe', 'on' => 'search'),
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
            'eventParticipants' => array(self::HAS_MANY, 'EventParticipant', 'event_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'event_id' => Yii::t('t', 'Event'),
            'event_name' => Yii::t('t', 'Name'),
            'description' => Yii::t('t', 'Description'),
            'event_url' => Yii::t('t', 'Url'),
            'date_start' => Yii::t('t', 'Start Date'),
            'date_end' => Yii::t('t', 'End Date'),
            'created_by' => Yii::t('t', 'Created By'),
            'image' => Yii::t('t', 'Image'),
            'place' => Yii::t('t', 'Place'),
            'active' => Yii::t('t', 'Active'),
            'date_created' => Yii::t('t', 'Date Created'),
            'event_name_ar' => Yii::t('t', 'Arabic Name'),
            'description_ar' => Yii::t('t', 'Arabic Description'),
            'place_ar' => Yii::t('t', 'Arabic Place'),
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

        $criteria->compare('event_id', $this->event_id);
        $criteria->compare('Lower(event_name)', strtolower($this->event_name), true);
        $criteria->compare('Lower(description)', strtolower($this->description), true);
        $criteria->compare('Lower(event_url)', strtolower($this->event_url), true);
        $criteria->compare('Lower(date_start)', strtolower($this->date_start), true);
        $criteria->compare('Lower(date_end)', strtolower($this->date_end), true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('Lower(image)', strtolower($this->image), true);
        $criteria->compare('Lower(place)', strtolower($this->place), true);
        $criteria->compare('active', $this->active);
        $criteria->compare('Lower(date_created)', strtolower($this->date_created), true);
        $criteria->compare('Lower(event_name_ar)', strtolower($this->event_name_ar), true);
        $criteria->compare('Lower(description_ar)', strtolower($this->description_ar), true);
        $criteria->compare('Lower(place_ar)', strtolower($this->place_ar), true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Event the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->image == '') {
                $this->image = 'event.jpg';
            }
            if ($this->event_url == '') {
                $this->event_url = 'event-'.Helper::Slugify($this->event_name);
            }

            return true;
        }
        return false;
    }

}
