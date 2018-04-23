<?php

/* @var $this NewsController */
/* @var $model News */
?>

<?php

$this->breadcrumbs = array(
    Yii::t('t', 'News') => array('index'),
    $model->news_id . ' - ' . $model->news_name,
);

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List News'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create News'), 'url' => array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update News'), 'url' => array('update', "id" => $model->news_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign', 'label' => Yii::t('t', 'Delete News'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', "id" => $model->news_id), 'confirm' => Yii::t('t', 'Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View News');
?>

<?php

$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'news_name',
        'description',
        'news_name_ar',
        'description_ar',
        //'created_by',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/news/' . $model->image, $model->news_name, array('width' => 120)),
        ),
        'active' => array(
            'name' => 'active',
            'value' => Helper::getActiveValue($model->active)
        ),
        'date_created',
    ),
));
?>