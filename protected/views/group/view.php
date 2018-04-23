<?php

/* @var $this GroupController */
/* @var $model Group */
?>

<?php

$this->breadcrumbs = array(
    Yii::t('t', 'Groups') => array('index'),
    $model->group_id . ' - ' . $model->group_name,
);

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Groups'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Group'), 'url' => array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update Group'), 'url' => array('update', "id" => $model->group_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign', 'label' => Yii::t('t', 'Delete Group'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', "id" => $model->group_id), 'confirm' => Yii::t('t', 'Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View Group');
?>

<?php

$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'group_name',
        'created_by' => array(
            'name' => 'created_by',
            'value' => $model->createdBy->user_name,
        ),
        'description',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/groups/' . $model->image, $model->group_name, array('width' => 120)),
        ),
        'date_created',
    ),
));
?>