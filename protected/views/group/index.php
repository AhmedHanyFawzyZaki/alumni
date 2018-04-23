<?php
/* @var $this GroupController */
/* @var $model Group */


$this->breadcrumbs = array(
    Yii::t('t', 'Groups') => array('index'),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List Groups');

$this->menu = array(
    array('icon' => 'glyphicon glyphicon-list', 'label' => Yii::t('t', 'List Groups'), 'url' => array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('t', 'Create Group'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#group-grid').yiiGridView('update', {
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
            'id' => 'group-grid',
            'type' => BsHtml::GRID_TYPE_HOVER,
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'group_name',
                'created_by' => array(
                    'name' => 'created_by',
                    'value' => '$data->createdBy->user_name',
                    'filter' => User::model()->getUsers()
                ),
                array(
                    'class' => 'bootstrap.widgets.BsButtonColumn',
                ),
            ),
        ));
        ?>
    </div>
</div>




