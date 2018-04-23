<?php
/* @var $this EventController */
/* @var $model Event */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Events')=>array('index'),
	Yii::t('t','Create Event'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Event');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Events'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>