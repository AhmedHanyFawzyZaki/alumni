<?php
/* @var $this GroupParticipantController */
/* @var $model GroupParticipant */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Group Participants')=>array('index'),
	Yii::t('t','Create Group Participant'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Group Participant');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Group Participants'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>