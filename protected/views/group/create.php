<?php
/* @var $this GroupController */
/* @var $model Group */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Groups')=>array('index'),
	Yii::t('t','Create Group'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Group');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Groups'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>