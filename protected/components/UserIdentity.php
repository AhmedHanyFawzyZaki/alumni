<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        /*         * ******only 1 super admin********** */
        //echo $this->password;die;

        $user = User::model()->findByAttributes(array('email' => $this->username, 'active' => 1)); //user_name is case insensitive
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID; //1
        } else if (!$user->validatePassword($this->password)) { //password is case sensitive
            $this->errorCode = self::ERROR_PASSWORD_INVALID; //2
        } else {
            $this->_id = $user->user_id;
            $this->username = $user->user_name;
            Yii::app()->user->setState('username', $user->user_name);
            Yii::app()->user->setState('usertype', $user->user_type_id);
            $this->errorCode = self::ERROR_NONE; //0
        }
        return $this->errorCode == self::ERROR_NONE; //0
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}
