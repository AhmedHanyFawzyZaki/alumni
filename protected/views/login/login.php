<?php
$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Login');

$rtl = Yii::app()->language == 'ar' ? '-rtl' : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta charset="UTF-8"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/bootstrap<?= $rtl ?>.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/admin/style<?= $rtl ?>.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/js/admin/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/admin/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />

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
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>"><b><?php echo Yii::t('t', CHtml::encode(Yii::app()->name)); ?></b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"><?php echo Yii::t('t', 'Sign in to start your session') ?></p>
                <?php
                $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                    'enableAjaxValidation' => true,
                    'id' => 'login-form',
                    'htmlOptions' => array(
                        'class' => 'bs-example'
                    ),
                ));
                ?>
                <div class="form-group has-feedback">
                    <?php
                    echo $form->textField($model, 'username', array('append' => BsHtml::icon(BsHtml::GLYPHICON_ENVELOPE), 'placeHolder' => Yii::t('t', 'Email')));
                    ?>
                </div>
                <div class="form-group has-feedback">
                    <?php
                    echo $form->passwordField($model, 'password', array('append' => BsHtml::icon(BsHtml::GLYPHICON_LOCK), 'placeHolder' => Yii::t('t', 'Password')));
                    ?>
                    <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
                </div>
                <div class="row">
                    <div class="col-xs-8">    
                        <div class="checkbox icheck">
                            <label>
                                <?php //echo $form->checkBox($model, 'rememberMe'); ?>
                            </label>
                        </div>                        
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <?php echo CHtml::submitButton(Yii::t('t', 'Login'), array('class' => 'btn btn-primary btn-block btn-flat')); ?>
                    </div><!-- /.col -->
                </div>
                <?php $this->endWidget(); ?>

                <!--<div class="social-auth-links text-center">
                  <p>- OR -</p>
                  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                </div><!-- /.social-auth-links -->

                <!--<a href="#">I forgot my password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a>-->

            </div><!-- /.login-box-body -->
            <div class="row text-center">
                <?php
                $lang = 'English';
                if (Yii::app()->language == 'en') {
                    $lang = 'العربية';
                }
                ?>
                <a href="<?= Yii::app()->request->baseUrl ?>/home/setLanguage" class="btn btn-vk" style="margin-top: 20px;"><i class="fa fa-language"></i> &nbsp;<?= $lang ?></a>
            </div>
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/admin/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/admin/iCheck/icheck.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>