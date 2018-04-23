<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs = array(
    Yii::t('t', 'Users') => array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Users');

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Users'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create User'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
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
            'id' => 'user-grid',
            'type' => BsHtml::GRID_TYPE_HOVER,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'user_name',
                'email',
                'national_id',
                'user_type_id' => array(
                    'name' => 'user_type_id',
                    'value' => '$data->userType->user_type_name',
                    'filter' => UserType::model()->getTypes()
                ),
                /*
                  'first_name',
                  'last_name',
                  'phone',
                  'major',
                  'graduation_year',
                  'reset_password_code',
                  'active',
                  'date_created',
                 */
                array(
                    'class' => 'bootstrap.widgets.BsButtonColumn',
                ),
            ),
        ));
        ?>
    </div>
</div>




