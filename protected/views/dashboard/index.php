<?php
$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Dashboard');
?>


<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= Group::model()->count(); ?></h3>
                <p><?= Yii::t('t', 'Groups') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= Yii::app()->request->baseUrl ?>/group" class="small-box-footer"><?= Yii::t('t', 'More info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= Event::model()->count(); ?></h3>
                <p><?= Yii::t('t', 'Events') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-calendar"></i>
            </div>
            <a href="<?= Yii::app()->request->baseUrl ?>/event" class="small-box-footer"><?= Yii::t('t', 'More info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= VolunteerWork::model()->count(); ?></h3>
                <p><?= Yii::t('t', 'Volunteer Work') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-share"></i>
            </div>
            <a href="<?= Yii::app()->request->baseUrl ?>/volunteerWork" class="small-box-footer"><?= Yii::t('t', 'More info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= TrainingCourse::model()->count(); ?></h3>
                <p><?= Yii::t('t', 'Training Courses') ?></p>
            </div>
            <div class="icon">
                <i class="fa fa-bank"></i>
            </div>
            <a href="<?= Yii::app()->request->baseUrl ?>/trainingCourse" class="small-box-footer"><?= Yii::t('t', 'More info') ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div>

<div class="container-fluid well">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-home"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>" class="info-box-number"><?= Yii::t('t', 'Home') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/user" class="info-box-number"><?= Yii::t('t', 'Users') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/group" class="info-box-number"><?= Yii::t('t', 'Groups') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-list"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/news" class="info-box-number"><?= Yii::t('t', 'News') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-pagelines"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/page" class="info-box-number"><?= Yii::t('t', 'Pages') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-calendar"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/event" class="info-box-number"><?= Yii::t('t', 'Events') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-bank"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/trainingCourse" class="info-box-number"><?= Yii::t('t', 'Training Courses') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient"><i class="fa fa-share"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/volunteerWork" class="info-box-number"><?= Yii::t('t', 'Volunteer Works') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-sign-out"></i></span>
            <div class="info-box-content">
                <a href="<?= Yii::app()->request->getBaseUrl() ?>/login/logout" class="info-box-number"><?= Yii::t('t', 'Logout') ?></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div>