<?php
/* @var $this SettingsController */
/* @var $model Settings */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Settings')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Settings');

$this->menu=array(
    //array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Settings'), 'url'=>array('index')),
    //array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Settings'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Settings'), 'url'=>array('view',"id"=>$model->id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>