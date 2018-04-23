<?php
/* @var $this VolunteerWorkController */
/* @var $model VolunteerWork */


$this->breadcrumbs = array(
    Yii::t('t', 'Volunteer Works') => array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Volunteer Works');

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Volunteer Works'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Volunteer Work'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#volunteer-work-grid').yiiGridView('update', {
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
            'id' => 'volunteer-work-grid',
            'type' => BsHtml::GRID_TYPE_HOVER,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'volunteer_work_name',
                'volunteer_work_name_ar',
                //'description',
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
                  'volunteer_work_name_ar',
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




