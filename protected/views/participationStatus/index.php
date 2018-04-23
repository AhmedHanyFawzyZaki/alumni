<?php
/* @var $this ParticipationStatusController */
/* @var $model ParticipationStatus */


$this->breadcrumbs=array(
	Yii::t('t','Participation Statuses')=>array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Participation Statuses');

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Participation Statuses'), 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Participation Status'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#participation-status-grid').yiiGridView('update', {
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
			'id'=>'participation-status-grid',
                        'type' => BsHtml::GRID_TYPE_HOVER,
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
        		'participation_status_id',
		'participation_status_name',
		'participation_status_name_ar',
				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
				),
			),
        )); ?>
    </div>
</div>




