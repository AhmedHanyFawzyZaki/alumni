<?php
/* @var $this EventParticipantController */
/* @var $model EventParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Event Participants')=>array('index'),
	Yii::t('t','Create Event Participant'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Event Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Event Participants'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>