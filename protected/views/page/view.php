<?php

/* @var $this PageController */
/* @var $model Page */
?>

<?php

$this->breadcrumbs = array(
    Yii::t('t', 'Pages') => array('index'),
    $model->page_id . ' - ' . $model->page_name,
);

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Pages'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Page'), 'url' => array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update Page'), 'url' => array('update', "id" => $model->page_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign', 'label' => Yii::t('t', 'Delete Page'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', "id" => $model->page_id), 'confirm' => Yii::t('t', 'Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Page');
?>

<?php

$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        //'page_id',
        'page_name',
        'description' => array(
            'name' => 'description',
            'value' => $model->description,
            'type' => 'raw',
        ),
        'page_name_ar',
        'description_ar' => array(
            'name' => 'description_ar',
            'value' => $model->description_ar,
            'type' => 'raw',
        ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/pages/' . $model->image, $model->page_name, array('width' => 120)),
        ),
        'active' => array(
            'name' => 'active',
            'value' => Helper::getActiveValue($model->active)
        ),
    ),
));
?>