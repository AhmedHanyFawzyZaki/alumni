<?php
/* @var $this GroupChatController */
/* @var $model GroupChat */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Group Chats')=>array('index'),
	Yii::t('t','Create Group Chat'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create Group Chat');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Group Chats'), 'url'=>array('index')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>