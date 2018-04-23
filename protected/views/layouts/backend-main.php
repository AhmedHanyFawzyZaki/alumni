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
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/files/css/admin/skins/skin-blue.min.css'); ?>

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.3 -->
        <?php
        if (!in_array(strtolower(Yii::app()->controller->action->id), array('index')) || in_array(strtolower(Yii::app()->controller->id), array('dashboard', 'report', 'settings')))
            Yii::app()->getClientScript()->registerCoreScript('yii');
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/jQuery/jQuery-2.1.3.min.js');
        ?>
        <!-- Bootstrap 3.3.2 JS -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/bootstrap.min.js'); ?>
        <!-- SlimScroll -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/slimScroll/jquery.slimscroll.min.js'); ?>
        <!-- FastClick -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/fastclick/fastclick.min.js'); ?>
        <!-- AdminLTE App -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/files/js/admin/dist/app.js'); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
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
    <body class="skin-blue fixed hidden-logo">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>" class="logo"><b><?php echo Yii::t('t', CHtml::encode(Yii::app()->params['name'])); ?></b></a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <?php
                                $lang = 'English';
                                if (Yii::app()->language == 'en') {
                                    $lang = 'العربية';
                                }
                                ?>
                                <!-- Menu Toggle Button -->
                                <a href="<?= Yii::app()->request->baseUrl ?>/home/setLanguage">
                                    <span><i class="fa fa-language"></i> <?= $lang ?></span>
                                </a>
                            </li>
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="<?= Yii::app()->request->baseUrl . '/login/logout' ?>">
                                    <span><i class="fa fa-sign-out"></i> <?= Yii::t('t', 'Logout') ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/avatars/user.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><br><?= Yii::app()->user->username ?></p>
                        </div>
                    </div>

                    <!-- search form (Optional) -->
                    <!--<form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <br>
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="<?= Helper::ActiveLink('dashboard', '', 'index') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/dashboard"><i class="fa fa-dashboard"></i><?= Yii::t('t', 'Dashboard') ?></a></li>
                        <li class="<?= Helper::ActiveLink('settings') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/settings"><i class="fa fa-gears"></i><?= Yii::t('t', 'Settings') ?></a></li>
                        <!--<li class="<?= Helper::ActiveLink('allowablenationalid') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/allowableNationalId"><i class="fa fa-umbrella"></i><?= Yii::t('t', 'Allowable National IDs') ?></a></li>-->
                        <li class="<?= Helper::ActiveLink('user') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/user"><i class="fa fa-user"></i><?= Yii::t('t', 'Users') ?></a></li>
                        <li class="<?= Helper::ActiveLink('group') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/group"><i class="fa fa-users"></i><?= Yii::t('t', 'Groups') ?></a></li>
                        <li class="<?= Helper::ActiveLink('news') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/news"><i class="fa fa-list"></i><?= Yii::t('t', 'News') ?></a></li>
                        <li class="<?= Helper::ActiveLink('page') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/page"><i class="fa fa-pagelines"></i><?= Yii::t('t', 'Pages') ?></a></li>
                        <li class="<?= Helper::ActiveLink('event') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/event"><i class="fa fa-calendar"></i><?= Yii::t('t', 'Events') ?></a></li>
                        <li class="<?= Helper::ActiveLink('trainingCourse') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/trainingCourse"><i class="fa fa-bank"></i><?= Yii::t('t', 'Training Courses') ?></a></li>
                        <li class="<?= Helper::ActiveLink('volunteerWork') ?>"><a href="<?= Yii::app()->request->baseUrl ?>/volunteerWork"><i class="fa fa-share"></i><?= Yii::t('t', 'Volunteer Works') ?></a></li>
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h5 class="col-lg-12 well">
                        <div class="col-lg-5">
                            <?php
                            if ($this->breadcrumbs) {
                                $this->widget('bootstrap.widgets.BsBreadCrumb', array(
                                    'links' => $this->breadcrumbs,
                                    // will change the container to ul
                                    'tagName' => 'ul',
                                    // will generate the clickable breadcrumb links
                                    'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                    // will generate the current page url : <li>News</li>
                                    'inactiveLinkTemplate' => '<li>{label}</li>',
                                    // will generate your homeurl item : <li><a href="/dr/dr/public_html/">Home</a></li>
                                    'homeLink' => BsHtml::openTag('li') . BsHtml::icon(BsHtml::GLYPHICON_HOME) . BsHtml::closeTag('li')
                                ));
                            } else {
                                echo '<i class="fa fa-dashboard"></i> ' . Yii::t('t', 'Dashboard');
                            }
                            ?>
                        </div>
                        <div class="col-lg-7 control-menu">
                            <?php
                            $this->widget('bootstrap.widgets.BsNavbar', array(
                                'collapse' => false,
                                'brandLabel' => '',
                                'items' => array(
                                    array(
                                        'class' => 'bootstrap.widgets.BsNav',
                                        'type' => 'navbar',
                                        'items' => $this->menu
                            ))));
                            //echo BsHtml::buttonDropdown('<span class="glyphicon glyphicon glyphicon-list"></span>', $this->menu);
                            ?>
                        </div>
                    </h5>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Page Content -->
                    <?= $content ?>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

        </div><!-- ./wrapper -->

        <?php
        /* if (Yii::app()->language == 'ar') {
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
          } */
        ?>
    </body>
</html>