<?php
/* @var $this EventParticipantController */
/* @var $model EventParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Event Participants')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Event Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Event Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Event Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Event Participant'), 'url'=>array('view',"id"=>$model->event_participant_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>