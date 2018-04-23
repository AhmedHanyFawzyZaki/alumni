<?php

/**
 * This is the model class for table "{{training_course}}".
 *
 * The followings are the available columns in table '{{training_course}}':
 * @property integer $training_course_id
 * @property string $training_course_name
 * @property string $price
 * @property string $description
 * @property string $training_course_url
 * @property string $date_start
 * @property string $date_end
 * @property integer $created_by
 * @property string $image
 * @property string $place
 * @property integer $active
 * @property string $date_created
 * @property string $training_course_name_ar
 * @property string $description_ar
 * @property string $place_ar
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property TrainingCourseParticipant[] $trainingCourseParticipants
 */
class TrainingCourse extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{training_course}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('training_course_name, description', 'required'),
            array('created_by, active', 'numerical', 'integerOnly' => true),
            array('training_course_name, training_course_url, image, place, training_course_name_ar, place_ar', 'length', 'max' => 255),
            array('price', 'length', 'max' => 10),
            array('date_start, date_end, date_created, description_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('training_course_id, training_course_name, price, description, training_course_url, date_start, date_end, created_by, image, place, active, date_created, training_course_name_ar, description_ar, place_ar', 'safe', 'on' => 'search'),
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
            'trainingCourseParticipants' => array(self::HAS_MANY, 'TrainingCourseParticipant', 'training_course_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'training_course_id' => Yii::t('t', 'Training Course'),
            'training_course_name' => Yii::t('t', 'Name'),
            'price' => Yii::t('t', 'Price'),
            'description' => Yii::t('t', 'Description'),
            'training_course_url' => Yii::t('t', 'Url'),
            'date_start' => Yii::t('t', 'Start Date'),
            'date_end' => Yii::t('t', 'End Date'),
            'created_by' => Yii::t('t', 'Created By'),
            'image' => Yii::t('t', 'Image'),
            'place' => Yii::t('t', 'Place'),
            'active' => Yii::t('t', 'Active'),
            'date_created' => Yii::t('t', 'Date Created'),
            'training_course_name_ar' => Yii::t('t', 'Arabic Name'),
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

        $criteria->compare('training_course_id', $this->training_course_id);
        $criteria->compare('Lower(training_course_name)', strtolower($this->training_course_name), true);
        $criteria->compare('Lower(price)', strtolower($this->price), true);
        $criteria->compare('Lower(description)', strtolower($this->description), true);
        $criteria->compare('Lower(training_course_url)', strtolower($this->training_course_url), true);
        $criteria->compare('Lower(date_start)', strtolower($this->date_start), true);
        $criteria->compare('Lower(date_end)', strtolower($this->date_end), true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('Lower(image)', strtolower($this->image), true);
        $criteria->compare('Lower(place)', strtolower($this->place), true);
        $criteria->compare('active', $this->active);
        $criteria->compare('Lower(date_created)', strtolower($this->date_created), true);
        $criteria->compare('Lower(training_course_name_ar)', strtolower($this->training_course_name_ar), true);
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
     * @return TrainingCourse the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->image == '') {
                $this->image = 'course.jpg';
            }
            if ($this->training_course_url == '') {
                $this->training_course_url = 'course-'.Helper::Slugify($this->training_course_name);
            }

            return true;
        }
        return false;
    }

}
