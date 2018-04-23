<?php
/* @var $this TrainingCourseController */
/* @var $model TrainingCourse */
?>

<?php
$this->breadcrumbs = array(
    Yii::t('t', 'Training Courses') => array('index'),
    $model->training_course_id . ' - ' . $model->training_course_name,
);

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Training Courses'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Training Course'), 'url' => array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update Training Course'), 'url' => array('update', "id" => $model->training_course_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign', 'label' => Yii::t('t', 'Delete Training Course'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', "id" => $model->training_course_id), 'confirm' => Yii::t('t', 'Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Training Course');
?>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        //'training_course_id',
        'training_course_name',
        'description',
        'training_course_name_ar',
        'description_ar',
        'place',
        'place_ar',
        'training_course_url',
        'price',
        'date_start',
        'date_end',
        //'created_by',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/courses/' . $model->image, $model->training_course_name, array('width' => 120)),
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
        $part = new TrainingCourseParticipant('search');
        $part->training_course_id = $model->training_course_id;
        $this->widget('bootstrap.widgets.BsGridView', array(
            'id' => 'training-course-grid',
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