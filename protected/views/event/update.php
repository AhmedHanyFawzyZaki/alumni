<?php
/* @var $this EventController */
/* @var $model Event */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Events')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Event');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Events'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Event'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Event'), 'url'=>array('view',"id"=>$model->event_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>