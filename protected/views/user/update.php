<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Users')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update User');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Users'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create User'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View User'), 'url'=>array('view',"id"=>$model->user_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>