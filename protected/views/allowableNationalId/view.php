<?php
/* @var $this AllowableNationalIdController */
/* @var $model AllowableNationalId */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Allowable National Ids')=>array('index'),
	$model->id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Allowable National Ids'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Allowable National Id'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update Allowable National Id'), 'url'=>array('update',"id"=>$model->id)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete Allowable National Id'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Allowable National Id');
?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id',
		'national_id',
	),
)); ?>