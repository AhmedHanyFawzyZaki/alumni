<?php
/* @var $this ParticipationStatusController */
/* @var $model ParticipationStatus */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Participation Statuses')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Participation Status');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Participation Statuses'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Participation Status'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Participation Status'), 'url'=>array('view',"id"=>$model->participation_status_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>