<?php
/* @var $this VolunteerWorkParticipantController */
/* @var $model VolunteerWorkParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Volunteer Work Participants')=>array('index'),
	Yii::t('t','Create Volunteer Work Participant'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Volunteer Work Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Volunteer Work Participants'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>