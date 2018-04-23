<?php
/* @var $this GroupController */
/* @var $model Group */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Groups')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Group');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Groups'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Group'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Group'), 'url'=>array('view',"id"=>$model->group_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>