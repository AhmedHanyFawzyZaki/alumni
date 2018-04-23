<?php
/* @var $this GroupChatController */
/* @var $model GroupChat */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Group Chats')=>array('index'),
        Yii::t('t','Update'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Update Group Chat');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Group Chats'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Group Chat'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>Yii::t('t','View Group Chat'), 'url'=>array('view',"id"=>$model->group_chat_id)),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>