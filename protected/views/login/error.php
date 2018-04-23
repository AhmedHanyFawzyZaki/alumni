<?php
$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Error') . $code;

$rtl = Yii::app()->language == 'ar' ? '-rtl' : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $this->pageTitle ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/bootstrap<?= $rtl ?>.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/admin/style<?= $rtl ?>.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/admin/skins/skin-red.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-red sidebar-collapse">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>" class="logo hidden-xs"><b><?php echo Yii::t('t', CHtml::encode(Yii::app()->name)); ?></b></a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="<?= Yii::app()->request->baseUrl ?>" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-home"></i> <?= Yii::t('t', 'Home') ?>
                                </a>
                            </li>
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="mailto:<?= Yii::app()->params['AdminEmail'] ?>" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope"></i> <?= Yii::t('t', 'Report Issue') ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content" style="min-height: 617px;">
                    <div class="error-page">
                        <h2 class="headline text-red"> <?php echo $code; ?></h2>
                        <div class="error-content">
                            <h3><i class="fa fa-warning text-red"></i> <?php echo Yii::t('t', 'Oops! Something Went Wrong') ?>.</h3>
                            <p>
                                <?php echo CHtml::encode($message);
                                ?>
                            </p>
                        </div><!-- /.error-content -->
                    </div><!-- /.error-page -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
        </div><!-- ./wrapper -->
    </body>
</html>
