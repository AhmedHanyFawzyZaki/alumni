<?php
/* @var $this TrainingCourseParticipantController */
/* @var $model TrainingCourseParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Training Course Participants')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Training Course Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Training Course Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Training Course Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Training Course Participant'), 'url'=>array('view',"id"=>$model->training_course_participant_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>