<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $user_id
 * @property string $user_name
 * @property string $email
 * @property string $password
 * @property string $image
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $national_id
 * @property string $major
 * @property string $graduation_year
 * @property integer $user_type_id
 * @property string $reset_password_code
 * @property integer $active
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property Event[] $events
 * @property EventParticipant[] $eventParticipants
 * @property Group[] $groups
 * @property GroupChat[] $groupChats
 * @property GroupParticipant[] $groupParticipants
 * @property News[] $news
 * @property TrainingCourse[] $trainingCourses
 * @property TrainingCourseParticipant[] $trainingCourseParticipants
 * @property UserType $userType
 * @property VolunteerWork[] $volunteerWorks
 * @property VolunteerWorkParticipant[] $volunteerWorkParticipants
 */
class User extends CActiveRecord {

    public $password_confirmation;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_name, email, password, user_type_id, national_id', 'required'),
            array('user_type_id, active', 'numerical', 'integerOnly' => true),
            array('user_name, email, password, image, first_name, last_name, phone, national_id, major, graduation_year, reset_password_code', 'length', 'max' => 255),
            array('date_created', 'safe'),
            array('email', 'email'),
            array('email, national_id', 'unique'),
            array('user_name, email, national_id', 'filter', 'filter' => 'trim'),
            array('password_confirmation', 'compare', 'compareAttribute' => 'password', 'on' => 'register'),
            array('national_id', 'validateNationalID', 'on' => 'register'),
            array('password_confirmation', 'required', 'on' => 'register'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('user_id, user_name, email, password, image, first_name, last_name, phone, national_id, major, graduation_year, user_type_id, reset_password_code, active, date_created', 'safe', 'on' => 'search'),
        );
    }

    public function validateNationalID() {
        $model = AllowableNationalId::model()->findByAttributes(array('national_id' => $this->national_id));
        if (!$model) {
            $this->addError('national_id', Yii::t('t', 'This national ID isn\'t found in our database.'));
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'events' => array(self::HAS_MANY, 'Event', 'created_by'),
            'eventParticipants' => array(self::HAS_MANY, 'EventParticipant', 'participant_id'),
            'groups' => array(self::HAS_MANY, 'Group', 'created_by'),
            'groupChats' => array(self::HAS_MANY, 'GroupChat', 'user_id'),
            'groupParticipants' => array(self::HAS_MANY, 'GroupParticipant', 'participant_id'),
            'news' => array(self::HAS_MANY, 'News', 'created_by'),
            'trainingCourses' => array(self::HAS_MANY, 'TrainingCourse', 'created_by'),
            'trainingCourseParticipants' => array(self::HAS_MANY, 'TrainingCourseParticipant', 'participant_id'),
            'userType' => array(self::BELONGS_TO, 'UserType', 'user_type_id'),
            'volunteerWorks' => array(self::HAS_MANY, 'VolunteerWork', 'created_by'),
            'volunteerWorkParticipants' => array(self::HAS_MANY, 'VolunteerWorkParticipant', 'participant_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => Yii::t('t', 'User'),
            'user_name' => Yii::t('t', 'Username'),
            'email' => Yii::t('t', 'Email'),
            'password' => Yii::t('t', 'Password'),
            'image' => Yii::t('t', 'Image'),
            'first_name' => Yii::t('t', 'First Name'),
            'last_name' => Yii::t('t', 'Last Name'),
            'phone' => Yii::t('t', 'Phone'),
            'national_id' => Yii::t('t', 'National ID'),
            'major' => Yii::t('t', 'Major'),
            'graduation_year' => Yii::t('t', 'Graduation Year'),
            'user_type_id' => Yii::t('t', 'User Type'),
            'reset_password_code' => Yii::t('t', 'Reset Password Code'),
            'active' => Yii::t('t', 'Active'),
            'date_created' => Yii::t('t', 'Date Created'),
			'password_confirmation' => Yii::t('t', 'Password Confirmation'),
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
        $criteria->condition = 'user_type_id != ' . Yii::app()->params['SuperAdmin'];

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('Lower(user_name)', strtolower($this->user_name), true);
        $criteria->compare('Lower(email)', strtolower($this->email), true);
        $criteria->compare('Lower(password)', strtolower($this->password), true);
        $criteria->compare('Lower(image)', strtolower($this->image), true);
        $criteria->compare('Lower(first_name)', strtolower($this->first_name), true);
        $criteria->compare('Lower(last_name)', strtolower($this->last_name), true);
        $criteria->compare('Lower(phone)', strtolower($this->phone), true);
        $criteria->compare('Lower(national_id)', strtolower($this->national_id), true);
        $criteria->compare('Lower(major)', strtolower($this->major), true);
        $criteria->compare('Lower(graduation_year)', strtolower($this->graduation_year), true);
        $criteria->compare('user_type_id', $this->user_type_id);
        $criteria->compare('Lower(reset_password_code)', strtolower($this->reset_password_code), true);
        $criteria->compare('active', $this->active);
        $criteria->compare('Lower(date_created)', strtolower($this->date_created), true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->password) {
                $this->password = $this->hash($this->password); //password_hash($this->password, PASSWORD_BCRYPT); //$this->hash($this->password);
            }

            if ($this->image == '') {
                $this->image = 'user.jpg';
            }

            return true;
        }
        return false;
    }

    protected function afterFind() {
        if ($this->password) {
            $this->password = $this->simple_decrypt($this->password); //password_hash($this->password, PASSWORD_BCRYPT); //$this->hash($this->password);
        }
        return true;
    }

    // Authentication methods
    public function hash($value) {
        return $this->simple_encrypt($value);
    }

    public function simple_encrypt($text, $salt = "!@#$%^&*1a2s3d4f") {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    public function simple_decrypt($text, $salt = "!@#$%^&*1a2s3d4f") {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    public function validatePassword($pass) {
        $valid = 0;
        if ($pass == $this->password)
            $valid = 1;

        return $valid;
    }

    public function getUsers() {
        return CHtml::listData(User::model()->findAll(array(
                            'condition' => 'user_type_id != ' . Yii::app()->params['SuperAdmin']
                        )), 'user_id', 'user_name');
    }

}
