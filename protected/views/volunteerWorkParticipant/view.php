<?php
/* @var $this VolunteerWorkParticipantController */
/* @var $model VolunteerWorkParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Volunteer Work Participants')=>array('index'),
	$model->volunteer_work_participant_id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Volunteer Work Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Volunteer Work Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update Volunteer Work Participant'), 'url'=>array('update',"id"=>$model->volunteer_work_participant_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete VolunteerWorkParticipant'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->volunteer_work_participant_id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Volunteer Work Participant');
?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'volunteer_work_participant_id',
		'volunteer_work_id',
		'participant_id',
		'participant_status',
	),
)); ?>