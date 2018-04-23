<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Alumni',
    'defaultController' => 'home',
    'language' => 'en',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'bootstrap.*',
        'bootstrap.components.*',
        'bootstrap.behaviors.*',
        'bootstrap.helpers.*',
        'bootstrap.widgets.*'
    ),
    'aliases' => array(
        'bootstrap' => 'ext.bootstrap'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        /*'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('*', '::1'),
        ),*/
    ),
    // application components
    'components' => array(
        'boostrap' => array(
            'class' => 'boostrap.components.BsApi'
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'autoUpdateFlash' => false, // add this line to disable the flash counter
        ),
        /* 'db' => array(
          'connectionString' => 'sqlite:protected/data/alumni.db',
          'tablePrefix' => 'al_',
          ), */
        // uncomment the following to use a MySQL database
        'db' => require(dirname(__FILE__) . '/db.php'),
        'errorHandler' => array(
            // use 'login/error' action to display errors
            'errorAction' => 'login/error',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'post/<id:\d+>/<title:.*?>' => 'post/view',
                'posts/<tag:.*?>' => 'post/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<slug>-page' => 'home/page',
                '_news' => 'home/news',
                '_newsDetails/<slug>' => 'home/newsDetails',
                '_events' => 'home/events',
                '_eventDetails/<slug>' => 'home/eventDetails',
                '_work' => 'home/work',
                '_workDetails/<slug>' => 'home/workDetails',
                '_courses' => 'home/courses',
                '_courseDetails/<slug>' => 'home/courseDetails',
                '_groups' => 'home/groups',
                '_search' => 'home/search',
            //'_groupRoom/<id:\d+>' => 'home/groupRoom',
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
);
