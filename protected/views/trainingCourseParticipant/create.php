<?php
/* @var $this TrainingCourseParticipantController */
/* @var $model TrainingCourseParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Training Course Participants')=>array('index'),
	Yii::t('t','Create Training Course Participant'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Training Course Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Training Course Participants'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>