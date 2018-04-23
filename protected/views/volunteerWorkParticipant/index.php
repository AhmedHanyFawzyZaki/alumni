<?php
/* @var $this VolunteerWorkParticipantController */
/* @var $model VolunteerWorkParticipant */


$this->breadcrumbs = array(
    Yii::t('t', 'Volunteer Work Participants') => array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Volunteer Work Participants');

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Volunteer Work Participants'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Volunteer Work Participant'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#volunteer-work-participant-grid').yiiGridView('update', {
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
            'id' => 'volunteer-work-participant-grid',
            'type' => BsHtml::GRID_TYPE_HOVER,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'volunteer_work_participant_id',
                'volunteer_work_id',
                'participant_id',
                'participant_status',
                array(
                    'class' => 'bootstrap.widgets.BsButtonColumn',
                ),
            ),
        ));
        ?>
    </div>
</div>




