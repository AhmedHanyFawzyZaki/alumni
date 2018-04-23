<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $news_id
 * @property string $news_name
 * @property string $news_url
 * @property string $description
 * @property integer $created_by
 * @property string $image
 * @property integer $active
 * @property string $date_created
 * @property string $news_name_ar
 * @property string $description_ar
 *
 * The followings are the available model relations:
 * @property User $createdBy
 */
class News extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{news}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('news_name, description', 'required'),
            array('news_url', 'unique'),
            array('created_by, active', 'numerical', 'integerOnly' => true),
            array('news_name, news_url, image, news_name_ar', 'length', 'max' => 255),
            array('date_created, description_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('news_id, news_name, news_url, description, created_by, image, active, date_created, news_name_ar, description_ar', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'news_id' => Yii::t('t', 'News'),
            'news_name' => Yii::t('t', 'Title'),
            'news_url' => Yii::t('t', 'Url'),
            'description' => Yii::t('t', 'Description'),
            'created_by' => Yii::t('t', 'Created By'),
            'image' => Yii::t('t', 'Image'),
            'active' => Yii::t('t', 'Active'),
            'date_created' => Yii::t('t', 'Date Created'),
            'news_name_ar' => Yii::t('t', 'Arabic Title'),
            'description_ar' => Yii::t('t', 'Arabic Description'),
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

        $criteria->compare('news_id', $this->news_id);
        $criteria->compare('Lower(news_name)', strtolower($this->news_name), true);
        $criteria->compare('Lower(news_url)', strtolower($this->news_url), true);
        $criteria->compare('Lower(description)', strtolower($this->description), true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('Lower(image)', strtolower($this->image), true);
        $criteria->compare('active', $this->active);
        $criteria->compare('Lower(date_created)', strtolower($this->date_created), true);
        $criteria->compare('Lower(news_name_ar)', strtolower($this->news_name_ar), true);
        $criteria->compare('Lower(description_ar)', strtolower($this->description_ar), true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->image == '') {
                $this->image = 'news.jpg';
            }
            if ($this->news_url == '') {
                $this->news_url = 'news-'.Helper::Slugify($this->news_name);
            }

            return true;
        }
        return false;
    }

}
