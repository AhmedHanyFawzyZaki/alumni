<?php

/* @var $this UserController */
/* @var $model User */
?>

<?php

$this->breadcrumbs = array(
    Yii::t('t', 'Users') => array('index'),
    $model->user_id . ' - ' . $model->user_name,
);

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Users'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create User'), 'url' => array('create')),
    array('icon' => 'glyphicon glyphicon-edit', 'label' => Yii::t('t', 'Update User'), 'url' => array('update', "id" => $model->user_id)),
    array('icon' => 'glyphicon glyphicon-minus-sign', 'label' => Yii::t('t', 'Delete User'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', "id" => $model->user_id), 'confirm' => Yii::t('t', 'Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View User');
?>

<?php

$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'user_type_id' => array(
            'name' => 'user_type_id',
            'value' => $model->userType->user_type_name
        ),
        'user_name',
        'national_id',
        'email',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/users/' . $model->image, $model->user_name, array('width' => 120)),
        ),
        'first_name',
        'last_name',
        'phone',
        'major',
        'graduation_year',
        'active' => array(
            'name' => 'active',
            'value' => Helper::getActiveValue($model->active)
        ),
        'date_created',
    ),
));
?>