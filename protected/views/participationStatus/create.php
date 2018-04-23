<?php
/* @var $this ParticipationStatusController */
/* @var $model ParticipationStatus */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Participation Statuses')=>array('index'),
	Yii::t('t','Create Participation Status'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Participation Status');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Participation Statuses'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>