<?php
/* @var $this TrainingCourseController */
/* @var $model TrainingCourse */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Training Courses')=>array('index'),
	Yii::t('t','Create Training Course'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Training Course');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Training Courses'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>