<?php
/* @var $this GroupChatController */
/* @var $model GroupChat */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('t','Group Chats')=>array('index'),
	$model->group_chat_id,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Group Chats'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Group Chat'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update Group Chat'), 'url'=>array('update',"id"=>$model->group_chat_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete GroupChat'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete',"id"=>$model->group_chat_id),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Group Chat');
?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'group_chat_id',
		'group_id',
		'user_id',
		'msg',
		'date_created',
	),
)); ?>