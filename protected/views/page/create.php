<?php
/* @var $this PageController */
/* @var $model Page */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Pages')=>array('index'),
	Yii::t('t','Create Page'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Page');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Pages'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>