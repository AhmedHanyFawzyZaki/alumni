<?php
/* @var $this TrainingCourseParticipantController */
/* @var $model TrainingCourseParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Training Course Participants')=>array('index'),
	$model->training_course_participant_id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Training Course Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Training Course Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update Training Course Participant'), 'url'=>array('update',"id"=>$model->training_course_participant_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete TrainingCourseParticipant'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->training_course_participant_id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Training Course Participant');
?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'training_course_participant_id',
		'training_course_id',
		'participant_id',
		'participant_status',
	),
)); ?>