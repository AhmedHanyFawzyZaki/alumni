<?php
/* @var $this AllowableNationalIdController */
/* @var $model AllowableNationalId */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Allowable National Ids')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Allowable National Id');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Allowable National Ids'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Allowable National Id'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Allowable National Id'), 'url'=>array('view',"id"=>$model->id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>