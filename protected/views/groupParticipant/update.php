<?php
/* @var $this GroupParticipantController */
/* @var $model GroupParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Group Participants')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Group Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Group Participants'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Group Participant'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Group Participant'), 'url'=>array('view',"id"=>$model->group_participant_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>