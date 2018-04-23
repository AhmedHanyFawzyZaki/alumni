<?php
/* @var $this TrainingCourseController */
/* @var $model TrainingCourse */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Training Courses')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Training Course');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Training Courses'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Training Course'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Training Course'), 'url'=>array('view',"id"=>$model->training_course_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>