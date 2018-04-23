<?php

class LoginController extends CController {

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    
    function init() {
        parent::init();
        if (Yii::app()->user->hasState('language'))
            Yii::app()->language = Yii::app()->user->getState('language');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->renderPartial('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionIndex() {
        if (!Yii::app()->user->isGuest) {
            if (Yii::app()->user->usertype == Yii::app()->params['Normal'])
                $this->redirect(Yii::app()->request->baseUrl);
            else
                $this->redirect(Yii::app()->request->baseUrl . '/dashboard');
        }
        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
            throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (in_array(Yii::app()->user->usertype, array(Yii::app()->params['SuperAdmin'], Yii::app()->params['Admin']))) {
                    $this->redirect(Yii::app()->request->baseUrl . '/dashboard');
                } else {
                    $this->redirect(Yii::app()->request->baseUrl);
                }
            }
        }
        // display the login form
        $this->renderPartial('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
