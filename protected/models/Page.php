<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property integer $page_id
 * @property string $page_name
 * @property string $description
 * @property string $image
 * @property integer $active
 * @property string $page_url
 * @property string $page_name_ar
 * @property string $description_ar
 */
class Page extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{page}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('page_name, description', 'required'),
            array('page_url', 'unique'),
            array('page_id, active', 'numerical', 'integerOnly' => true),
            array('page_name, image, page_url, page_name_ar', 'length', 'max' => 255),
            array('description_ar', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('page_id, page_name, description, image, active, page_url, page_name_ar, description_ar', 'safe', 'on' => 'search'),
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
            'page_id' => Yii::t('t', 'Page'),
            'page_name' => Yii::t('t', 'Title'),
            'description' => Yii::t('t', 'Description'),
            'image' => Yii::t('t', 'Image'),
            'active' => Yii::t('t', 'Active'),
            'page_url' => Yii::t('t', 'Url'),
            'page_name_ar' => Yii::t('t', 'Arabic Title'),
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

        $criteria->compare('page_id', $this->page_id);
        $criteria->compare('Lower(page_name)', strtolower($this->page_name), true);
        $criteria->compare('Lower(description)', strtolower($this->description), true);
        $criteria->compare('Lower(image)', strtolower($this->image), true);
        $criteria->compare('active', $this->active);
        $criteria->compare('Lower(page_url)', strtolower($this->page_url), true);
        $criteria->compare('Lower(page_name_ar)', strtolower($this->page_name_ar), true);
        $criteria->compare('Lower(description_ar)', strtolower($this->description_ar), true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->image == '') {
                $this->image = 'page.jpg';
            }
            if ($this->page_url == '') {
                $this->page_url = 'page-'.Helper::Slugify($this->page_name);
            }

            return true;
        }
        return false;
    }

}
