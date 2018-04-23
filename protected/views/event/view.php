<?php

/* @var $this EventController */
/* @var $model Event */
?>

<?php

$this->breadcrumbs = array(
    Yii::t('t', 'Events') => array('index'),
    $model->event_id,
);

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Events'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Event'), 'url' => array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update Event'), 'url' => array('update', "id" => $model->event_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign', 'label' => Yii::t('t', 'Delete Event'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', "id" => $model->event_id), 'confirm' => Yii::t('t', 'Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Event');
?>

<?php

$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        //'event_id',
        'event_name',
        'description',
        'event_name_ar',
        'description_ar',
        'date_start',
        'date_end',
        //'created_by',
        'place',
        'place_ar',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/events/' . $model->image, $model->event_name, array('width' => 120)),
        ),
        'active' => array(
            'name' => 'active',
            'value' => Helper::getActiveValue($model->active)
        ),
        'event_url',
        'date_created',
    ),
));
?>