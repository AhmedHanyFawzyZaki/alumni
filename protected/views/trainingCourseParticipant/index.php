<?php
/* @var $this TrainingCourseParticipantController */
/* @var $model TrainingCourseParticipant */


$this->breadcrumbs=array(
	Yii::t('t','Training Course Participants')=>array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Training Course Participants');

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List Training Course Participants'), 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create Training Course Participant'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#training-course-participant-grid').yiiGridView('update', {
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
			'id'=>'training-course-participant-grid',
                        'type' => BsHtml::GRID_TYPE_HOVER,
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
        		'training_course_participant_id',
		'training_course_id',
		'participant_id',
		'participant_status',
				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
				),
			),
        )); ?>
    </div>
</div>




