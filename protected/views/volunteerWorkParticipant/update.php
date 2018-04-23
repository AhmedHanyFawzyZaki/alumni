<?php
/* @var $this VolunteerWorkParticipantController */
/* @var $model VolunteerWorkParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Volunteer Work Participants')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Volunteer Work Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Volunteer Work Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Volunteer Work Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Volunteer Work Participant'), 'url'=>array('view',"id"=>$model->volunteer_work_participant_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>