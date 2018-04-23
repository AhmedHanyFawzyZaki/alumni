<?php
/* @var $this GroupParticipantController */
/* @var $model GroupParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Group Participants')=>array('index'),
	$model->group_participant_id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Group Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Group Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update Group Participant'), 'url'=>array('update',"id"=>$model->group_participant_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete GroupParticipant'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->group_participant_id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Group Participant');
?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'group_participant_id',
		'group_id',
		'participant_id',
	),
)); ?>