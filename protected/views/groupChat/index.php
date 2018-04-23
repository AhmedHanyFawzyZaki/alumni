<?php
/* @var $this GroupChatController */
/* @var $model GroupChat */


$this->breadcrumbs=array(
	Yii::t('t','Group Chats')=>array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Group Chats');

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Group Chats'), 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Group Chat'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#group-chat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="panel panel-default clear">
    <div class="panel-body">
        
        <?php echo BsHtml::link(Yii::t('t','Advanced Search'),'#',array('class'=>'search-button btn btn-primary')); ?>        
        <div class="search-form well clear" style="display:none">
            <?php $this->renderPartial('_search',array(
                'model'=>$model,
            )); ?>
        </div>
        <!-- search-form -->
<hr class="clear">
        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'group-chat-grid',
                        'type' => BsHtml::GRID_TYPE_HOVER,
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
        		'group_chat_id',
		'group_id',
		'user_id',
		'msg',
		'date_created',
				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
				),
			),
        )); ?>
    </div>
</div>




