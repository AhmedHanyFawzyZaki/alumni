<?php
/* @var $this EventController */
/* @var $model Event */


$this->breadcrumbs = array(
    Yii::t('t', 'Events') => array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Events');

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Events'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Event'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#event-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="panel panel-default clear">
    <div class="panel-body">

        <?php echo BsHtml::link(Yii::t('t', 'Advanced Search'), '#', array('class' => 'search-button btn btn-primary')); ?>        
        <div class="search-form well clear" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>
        </div>
        <!-- search-form -->
        <hr class="clear">
        <?php
        $this->widget('bootstrap.widgets.BsGridView', array(
            'id' => 'event-grid',
            'type' => BsHtml::GRID_TYPE_HOVER,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                //'event_id',
                'event_name',
                'event_name_ar',
                //'description',
                //'event_url',
                'date_start',
                'date_end',
                'place',
                'active' => array(
                    'name' => 'active',
                    'value' => 'Helper::getActiveValue($data->active)',
                    'filter' => Helper::getActiveFilter()
                ),
                /*
                  'created_by',
                  'image',
                  'active',
                  'date_created',
                  'description_ar',
                  'place_ar',
                 */
                array(
                    'class' => 'bootstrap.widgets.BsButtonColumn',
                ),
            ),
        ));
        ?>
    </div>
</div>




