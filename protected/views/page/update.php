<?php
/* @var $this PageController */
/* @var $model Page */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Pages')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Page');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Pages'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Page'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Page'), 'url'=>array('view',"id"=>$model->page_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>