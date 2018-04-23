<?php
/* @var $this TrainingCourseController */
/* @var $model TrainingCourse */


$this->breadcrumbs = array(
    Yii::t('t', 'Training Courses') => array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Training Courses');

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Training Courses'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Training Course'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#training-course-grid').yiiGridView('update', {
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
            'id' => 'training-course-grid',
            'type' => BsHtml::GRID_TYPE_HOVER,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                //'training_course_id',
                'training_course_name',
                'training_course_name_ar',
                'price',
                'place',
                'active' => array(
                    'name' => 'active',
                    'value' => 'Helper::getActiveValue($data->active)',
                    'filter' => Helper::getActiveFilter()
                ),
                //'description',
                //'training_course_url',
                //'date_start',
                /*
                  'date_end',
                  'created_by',
                  'image',
                  'place',
                  'active',
                  'date_created',
                  'training_course_name_ar',
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




