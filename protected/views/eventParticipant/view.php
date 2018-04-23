<?php
/* @var $this EventParticipantController */
/* @var $model EventParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Event Participants')=>array('index'),
	$model->event_participant_id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Event Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Event Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update Event Participant'), 'url'=>array('update',"id"=>$model->event_participant_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete EventParticipant'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->event_participant_id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Event Participant');
?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'event_participant_id',
		'event_id',
		'participant_id',
		'participant_status',
	),
)); ?>