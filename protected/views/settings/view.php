<?php

/* @var $this SettingsController */
/* @var $model Settings */
?>

<?php

$this->breadcrumbs = array(
    Yii::t('t', 'Settings') => array('index'),
        //$model->id,
);

$this->menu = array(
    //array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Settings'), 'url'=>array('index')),
    //array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Settings'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update Settings'), 'url' => array('update', "id" => $model->id)),
        //array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete Settings'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Settings');
?>

<?php

$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        //'id',
        'app_name',
        'email',
        'phone',
        'address',
        array(
            'name' => 'logo',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->logo, 'logo', array('width' => 120)),
        ),
        array(
            'name' => 'home_banner',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->home_banner, 'home_banner', array('width' => 120)),
        ),
        array(
            'name' => 'news_banner',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->news_banner, 'news_banner', array('width' => 120)),
        ),
        array(
            'name' => 'events_banner',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->events_banner, 'events_banner', array('width' => 120)),
        ),
        array(
            'name' => 'volunteer_work_banner',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->volunteer_work_banner, 'volunteer_work_banner', array('width' => 120)),
        ),
        array(
            'name' => 'groups_banner',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->groups_banner, 'groups_banner', array('width' => 120)),
        ),
        array(
            'name' => 'training_course_banner',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->training_course_banner, 'training_course_banner', array('width' => 120)),
        ),
        'facebook_link',
        'twitter_link',
        'google_link',
    ),
));
?>