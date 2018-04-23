<?php

/**
 * This is the model class for table "{{volunteer_work}}".
 *
 * The followings are the available columns in table '{{volunteer_work}}':
 * @property integer $volunteer_work_id
 * @property string $volunteer_work_name
 * @property string $description
 * @property string $place
 * @property string $date_start
 * @property string $date_end
 * @property integer $created_by
 * @property string $image
 * @property integer $active
 * @property string $date_created
 * @property string $volunteer_work_name_ar
 * @property string $description_ar
 * @property string $place_ar
 * @property string $volunteer_work_url
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property VolunteerWorkParticipant[] $volunteerWorkParticipants
 */
class VolunteerWork extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{volunteer_work}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('volunteer_work_name, description', 'required'),
            array('volunteer_work_url', 'unique'),
            array('created_by, active', 'numerical', 'integerOnly' => true),
            array('volunteer_work_name, place, image, volunteer_work_name_ar, place_ar, volunteer_work_url', 'length', 'max' => 255),
            array('date_start, date_end, date_created, description_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('volunteer_work_id, volunteer_work_name, description, place, date_start, date_end, created_by, image, active, date_created, volunteer_work_name_ar, description_ar, place_ar, volunteer_work_url', 'safe', 'on' => 'search'),
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
            'volunteerWorkParticipants' => array(self::HAS_MANY, 'VolunteerWorkParticipant', 'volunteer_work_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'volunteer_work_id' => Yii::t('t', 'Volunteer Work'),
            'volunteer_work_name' => Yii::t('t', 'Vol. Work Name'),
            'description' => Yii::t('t', 'Description'),
            'place' => Yii::t('t', 'Place'),
            'date_start' => Yii::t('t', 'Start Date'),
            'date_end' => Yii::t('t', 'End Date'),
            'created_by' => Yii::t('t', 'Created By'),
            'image' => Yii::t('t', 'Image'),
            'active' => Yii::t('t', 'Active'),
            'date_created' => Yii::t('t', 'Date Created'),
            'volunteer_work_name_ar' => Yii::t('t', 'Arabic Name'),
            'description_ar' => Yii::t('t', 'Arabic Description'),
            'place_ar' => Yii::t('t', 'Arabic Place'),
            'volunteer_work_url' => Yii::t('t', 'Url'),
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

        $criteria->compare('volunteer_work_id', $this->volunteer_work_id);
        $criteria->compare('Lower(volunteer_work_name)', strtolower($this->volunteer_work_name), true);
        $criteria->compare('Lower(description)', strtolower($this->description), true);
        $criteria->compare('Lower(place)', strtolower($this->place), true);
        $criteria->compare('Lower(date_start)', strtolower($this->date_start), true);
        $criteria->compare('Lower(date_end)', strtolower($this->date_end), true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('Lower(image)', strtolower($this->image), true);
        $criteria->compare('active', $this->active);
        $criteria->compare('Lower(date_created)', strtolower($this->date_created), true);
        $criteria->compare('Lower(volunteer_work_name_ar)', strtolower($this->volunteer_work_name_ar), true);
        $criteria->compare('Lower(description_ar)', strtolower($this->description_ar), true);
        $criteria->compare('Lower(place_ar)', strtolower($this->place_ar), true);
        $criteria->compare('Lower(volunteer_work_url)', strtolower($this->volunteer_work_url), true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VolunteerWork the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->image == '') {
                $this->image = 'work.jpg';
            }
            if ($this->volunteer_work_url == '') {
                $this->volunteer_work_url = 'work-'.Helper::Slugify($this->volunteer_work_name);
            }

            return true;
        }
        return false;
    }

}
