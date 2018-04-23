<?php
/* @var $this SettingsController */
/* @var $model Settings */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Settings')=>array('index'),
	//Yii::t('t','Create Settings'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Settings');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Settings'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>