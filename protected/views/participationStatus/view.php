<?php
/* @var $this ParticipationStatusController */
/* @var $model ParticipationStatus */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Participation Statuses')=>array('index'),
	$model->participation_status_id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Participation Statuses'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Participation Status'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update Participation Status'), 'url'=>array('update',"id"=>$model->participation_status_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete ParticipationStatus'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->participation_status_id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Participation Status');
?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'participation_status_id',
		'participation_status_name',
		'participation_status_name_ar',
	),
)); ?>