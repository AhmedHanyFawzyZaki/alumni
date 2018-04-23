<?php
$rtl = Yii::app()->language == 'ar' ? '-rtl' : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="<?= Yii::app()->language ?>" />
        <meta charset="UTF-8"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <!-- Bootstrap 3.3.2 -->
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/files/css/bootstrap' . $rtl . '.css'); ?>
        <!-- Font Awesome Icons -->
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/files/font-awesome/css/font-awesome.min.css'); ?>
        <!-- Ionicons -->
        <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/files/css/admin/style' . $rtl . '.css'); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/files/css/admin/skins/skin-red.min.css'); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/files/css/front/style.css'); ?>

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.3 -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/jQuery/jQuery-2.1.3.min.js'); ?>
        <!-- Bootstrap 3.3.2 JS -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/bootstrap.min.js'); ?>
        <!-- SlimScroll -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/slimScroll/jquery.slimScroll.min.js'); ?>
        <!-- FastClick -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/fastclick/fastclick.min.js'); ?>
        <!-- AdminLTE App -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/dist/app.min.js'); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
            .form-group{
                float: none;
                width: 100%;
            }
        </style>
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the 
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |  
    |---------------------------------------------------------|
    
    To hide logo bar in small screens do the following:
    1- add class "hidden-logo" to the body class.
    2- add class "hidden-xs" to the logo element.
     
    -->
    <body class="skin-red sidebar-collapse">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
                <section class="content no-padding-updown no-minheight">
                    <div class="row">
                        <div class="container">
                            <div class="col-lg-3 col-sm-5 no-padding text-xs-center">
                                <!-- Logo -->
                                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>" class="logo"><img src="<?= Yii::app()->request->baseUrl ?>/files/uploads/settings/<?= Yii::app()->params['logo'] ?>"></a>
                            </div>
                            <div class="col-lg-offset-6 col-lg-3 col-sm-offset-2 col-sm-5 col-xs-10 col-xs-offset-1 text-center">
                                <form action="<?= Yii::app()->request->getBaseUrl() ?>/_search" method="get" class="sidebar-form">
                                    <div class="input-group">
                                        <input type="text" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" class="form-control" placeholder="<?= Yii::t('t', 'Search...') ?>">
                                        <span class="input-group-btn">
                                            <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                                <?php
                                $ar = 'active';
                                $en = '';
                                if (Yii::app()->language == 'en') {
                                    $ar = '';
                                    $en = 'active';
                                }
                                ?>
                                <a href="<?= Yii::app()->request->baseUrl ?>/home/setLanguage" class="btn btn-dropbox <?= $en ?>">English &nbsp;<i class="fa fa-language"></i></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="<?= Yii::app()->request->baseUrl ?>/home/setLanguage" class="btn btn-dropbox <?= $ar ?>">عربي &nbsp;&nbsp;<i class="fa fa-language"></i></a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <nav class="navbar navbar-default nav-custom">
                            <div class="container">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="fa fa-bars"></span>
                                    </button>
                                    <a class="navbar-brand <?= 'navbar-brand-' . Helper::ActiveLink('home', '', 'index') ?>" href="<?= Yii::app()->request->getBaseUrl() ?>"><?= Yii::t('t', 'Home') ?></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/_news" class="navbar-brand-<?= Helper::ActiveLink('home', array('news', 'newsDetails'), '', 1) ?>"><?= Yii::t('t', 'News') ?></a></li>
                                        <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/_events" class="navbar-brand-<?= Helper::ActiveLink('home', array('events', 'eventDetails'), '', 1) ?>"><?= Yii::t('t', 'Events') ?></a></li>
                                        <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/_work" class="navbar-brand-<?= Helper::ActiveLink('home', array('work', 'workDetails'), '', 1) ?>"><?= Yii::t('t', 'Volunteer') ?></a></li>
                                        <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/_groups" class="navbar-brand-<?= Helper::ActiveLink('home', '', 'groups') ?>"><?= Yii::t('t', 'Groups') ?></a></li>
                                        <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/_courses" class="navbar-brand-<?= Helper::ActiveLink('home', array('courses', 'courseDetails'), '', 1) ?>"><?= Yii::t('t', 'Training Courses') ?></a></li>
                                        <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/about-page" class="navbar-brand-<?= Helper::ActiveLink('home', '', 'page') ?>"><?= Yii::t('t', 'About Us') ?></a></li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <?php
                                        if (Yii::app()->user->isGuest) {
                                            ?>
                                            <li>
                                                <a href="#" id="login-btn" data-toggle="modal" data-target="#loginModal"><?= Yii::t('t', 'Login') ?></a> 
                                            </li>
                                            <li>
                                                <a href="#" id="register-btn" data-toggle="modal" data-target="#registerModal"><?= Yii::t('t', 'Register') ?></a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li>
                                                <a href="<?= Yii::app()->request->getBaseUrl() ?>/home/profile?code=<?= urlencode(Helper::encryptAlgo(Yii::app()->user->id)) ?>" ><?= Yii::t('t', 'Profile') ?></a> 
                                            </li>
                                            <li>
                                                <a href="<?= Yii::app()->request->getBaseUrl() ?>/login/logout" ><?= Yii::t('t', 'Logout') ?></a> 
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </section>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php $this->renderPartial('//layouts/loginModal') ?>
                <?php $this->renderPartial('//layouts/forgotModal') ?>
                <?php $this->renderPartial('//layouts/registerModal') ?>
                <!-- Main content -->
                <section class="content no-padding">
                    <?php $this->renderPartial('//layouts/alert') ?>
                    <!-- Page Content -->
                    <?= $content ?>
                </section><!-- /.content -->
                <div class="row padding20 no-padding-rightleft">
                    <div class="container">
                        <div class="col-sm-4 no-padding">
                            <div class="info-box bg-blue no-margin">
                                <span class="info-box-icon"><i class="fa fa-phone"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= Yii::t('t', 'You can contact us on') ?>:</span>
                                    <span class="info-box-number"><i class="fa fa-phone"></i> <?= Yii::app()->params['phone'] ?></span>
                                    <span class="progress-description wrap-text"><i class="fa fa-envelope"></i> <?= Yii::app()->params['email'] ?></span>
                                </div><!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-box bg-red no-margin">
                                <span class="info-box-icon"><i class="fa fa-share-alt"></i></span>
                                <div class="info-box-content">
                                    <div class="col-md-10 no-padding">
                                        <span class="info-box-text"><?= Yii::t('t', 'Stay Connected') ?>:</span>
                                        <a class="text-white" href="<?= Yii::app()->params['facebook_link'] ?>" target="_blank"><i class="fa fa-facebook-square facebook-icon"></i> </a>
                                        <a class="text-white" href="<?= Yii::app()->params['twitter_link'] ?>" target="_blank"><i class="fa fa-twitter-square facebook-icon"></i> </a>
                                        <a class="text-white" href="<?= Yii::app()->params['google_link'] ?>" target="_blank"><i class="fa fa-google-plus-square facebook-icon"></i> </a>
                                    </div>
                                </div><!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-4 no-padding">
                            <div class="info-box bg-green no-margin">
                                <span class="info-box-icon"><i class="fa fa-building"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= Yii::t('t', 'Address') ?>:</span>
                                    <span class="info-box-text wrap-text"><?= Yii::t('t', Yii::app()->params['address']); ?></span>
                                </div><!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="container">
                    <div class="col-sm-6">
                        <ul class="list-inline hidden">
                            <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/mission-page"><?= Yii::t('t', 'Mission') ?></a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/about-page"><?= Yii::t('t', 'About Us') ?></a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/vision-page"><?= Yii::t('t', 'Vision') ?></a></li>
                            <li><a href="<?= Yii::app()->request->getBaseUrl() ?>/terms-page"><?= Yii::t('t', 'Terms & Conditions') ?></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span>Copyright &copy; <?= date('Y') ?>. <?= Yii::t('t', 'All Rights Reserved') ?>.</span>
                    </div>
                </div>
            </footer>

        </div><!-- ./wrapper -->

        <?php
        if (Yii::app()->language == 'ar') {
            ?>
            <script>
                var map = ["\u0660", "\u0661", "\u0662", "\u0663", "\u0664", "\u0665", "\u0666", "\u0667", "\u0668", "\u0669"];


                function replaceNumbers(node) {
                    if (node.nodeType == 3) //Text nodes only
                        node.nodeValue = node.nodeValue.replace(/[0-9]/g, getArabicNumber);
                }

                function getArabicNumber(n) {
                    return map[parseInt(n, 10)];
                }

                function walk(node, func) {
                    func(node);
                    node = node.firstChild;
                    while (node) {
                        walk(node, func);
                        node = node.nextSibling;
                    }
                }

                walk(document.body, replaceNumbers);
            </script>
            <?php
        }
        ?>
    </body>
</html>