<?php
/* @var $this AllowableNationalIdController */
/* @var $model AllowableNationalId */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Allowable National Ids')=>array('index'),
	Yii::t('t','Create Allowable National Id'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Allowable National Id');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Allowable National Ids'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>