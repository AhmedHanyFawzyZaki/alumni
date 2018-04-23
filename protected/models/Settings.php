<?php

/**
 * This is the model class for table "{{settings}}".
 *
 * The followings are the available columns in table '{{settings}}':
 * @property integer $id
 * @property string $app_name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $logo
 * @property string $home_banner
 * @property string $news_banner
 * @property string $events_banner
 * @property string $volunteer_work_banner
 * @property string $groups_banner
 * @property string $training_course_banner
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $google_link
 */
class Settings extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{settings}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('app_name, email, phone, address, logo, home_banner, news_banner, events_banner, volunteer_work_banner, groups_banner, training_course_banner', 'required'),
            array('app_name, email, phone, address, logo, home_banner, news_banner, events_banner, volunteer_work_banner, groups_banner, training_course_banner, facebook_link, twitter_link, google_link', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, app_name, email, phone, address, logo, home_banner, news_banner, events_banner, volunteer_work_banner, groups_banner, training_course_banner, facebook_link, twitter_link, google_link', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('t', 'ID'),
            'app_name' => Yii::t('t', 'App Name'),
            'email' => Yii::t('t', 'Email'),
            'phone' => Yii::t('t', 'Phone'),
            'address' => Yii::t('t', 'Address'),
            'logo' => Yii::t('t', 'Logo'),
            'home_banner' => Yii::t('t', 'Home Banner'),
            'news_banner' => Yii::t('t', 'News Banner'),
            'events_banner' => Yii::t('t', 'Events Banner'),
            'volunteer_work_banner' => Yii::t('t', 'Work Banner'),
            'groups_banner' => Yii::t('t', 'Groups Banner'),
            'training_course_banner' => Yii::t('t', 'Course Banner'),
            'facebook_link' => Yii::t('t', 'Facebook Link'),
            'twitter_link' => Yii::t('t', 'Twitter Link'),
            'google_link' => Yii::t('t', 'Google Link'),
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

        $criteria->compare('id', $this->id);
        $criteria->compare('Lower(app_name)', strtolower($this->app_name), true);
        $criteria->compare('Lower(email)', strtolower($this->email), true);
        $criteria->compare('Lower(phone)', strtolower($this->phone), true);
        $criteria->compare('Lower(address)', strtolower($this->address), true);
        $criteria->compare('Lower(logo)', strtolower($this->logo), true);
        $criteria->compare('Lower(home_banner)', strtolower($this->home_banner), true);
        $criteria->compare('Lower(news_banner)', strtolower($this->news_banner), true);
        $criteria->compare('Lower(events_banner)', strtolower($this->events_banner), true);
        $criteria->compare('Lower(volunteer_work_banner)', strtolower($this->volunteer_work_banner), true);
        $criteria->compare('Lower(groups_banner)', strtolower($this->groups_banner), true);
        $criteria->compare('Lower(training_course_banner)', strtolower($this->training_course_banner), true);
        $criteria->compare('Lower(facebook_link)', strtolower($this->facebook_link), true);
        $criteria->compare('Lower(twitter_link)', strtolower($this->twitter_link), true);
        $criteria->compare('Lower(google_link)', strtolower($this->google_link), true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Settings the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
