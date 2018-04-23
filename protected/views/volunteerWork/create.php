<?php
/* @var $this VolunteerWorkController */
/* @var $model VolunteerWork */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Volunteer Works')=>array('index'),
	Yii::t('t','Create Volunteer Work'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Volunteer Work');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Volunteer Works'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>