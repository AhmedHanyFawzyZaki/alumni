<?php
/* @var $this VolunteerWorkController */
/* @var $model VolunteerWork */
?>

<?php
$this->breadcrumbs = array(
    Yii::t('t', 'Volunteer Works') => array('index'),
    $model->volunteer_work_id . ' - ' . $model->volunteer_work_name,
);

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Volunteer Works'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Volunteer Work'), 'url' => array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update Volunteer Work'), 'url' => array('update', "id" => $model->volunteer_work_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign', 'label' => Yii::t('t', 'Delete Volunteer Work'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', "id" => $model->volunteer_work_id), 'confirm' => Yii::t('t', 'Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Volunteer Work');
?>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        //'volunteer_work_id',
        'volunteer_work_name',
        'description',
        'place',
        'volunteer_work_name_ar',
        'description_ar',
        'place_ar',
        'date_start',
        'date_end',
        //'created_by',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/works/' . $model->image, $model->volunteer_work_name, array('width' => 120)),
        ),
        'active' => array(
            'name' => 'active',
            'value' => Helper::getActiveValue($model->active)
        ),
        'date_created',
    ),
));
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><b><?= Yii::t('t', 'Participants') ?></b></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php
        $part = new VolunteerWorkParticipant('search');
        $part->volunteer_work_id = $model->volunteer_work_id;
        $this->widget('bootstrap.widgets.BsGridView', array(
            'id' => 'volunteer-work-participant-grid',
            'type' => BsHtml::GRID_TYPE_HOVER,
            'dataProvider' => $part->search(),
            'columns' => array(
                'participant_id' => array(
                    'name' => 'participant_id',
                    'value' => '$data->participant->user_name',
                ),
                'participant_status' => array(
                    'name' => 'participant_status',
                    'value' => '$data->participantStatus->participation_status_name',
                ),
            ),
        ));
        ?>
    </div>
</div>