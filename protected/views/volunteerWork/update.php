<?php
/* @var $this VolunteerWorkController */
/* @var $model VolunteerWork */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Volunteer Works')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Volunteer Work');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Volunteer Works'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Volunteer Work'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Volunteer Work'), 'url'=>array('view',"id"=>$model->volunteer_work_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>