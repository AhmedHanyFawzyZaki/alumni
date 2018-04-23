<?php
/* @var $this AllowableNationalIdController */
/* @var $model AllowableNationalId */


$this->breadcrumbs=array(
	Yii::t('t','Allowable National Ids')=>array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Allowable National Ids');

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Allowable National Ids'), 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Allowable National Id'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#allowable-national-id-grid').yiiGridView('update', {
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
			'id'=>'allowable-national-id-grid',
                        'type' => BsHtml::GRID_TYPE_HOVER,
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
        		'national_id',
				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
				),
			),
        )); ?>
    </div>
</div>




