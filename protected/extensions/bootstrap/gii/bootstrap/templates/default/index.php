<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
echo "\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('t','$label')=>array('index'),
);\n";

?>

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'List <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>');

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>'), 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create <?php echo $this->class2name($this->modelClass); ?>'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="panel panel-default clear">
    <div class="panel-body">
        
        <?php echo "<?php echo BsHtml::link(Yii::t('t','Advanced Search'),'#',array('class'=>'search-button btn btn-primary')); ?>"; ?>
        
        <div class="search-form well clear" style="display:none">
            <?php echo "<?php \$this->renderPartial('_search',array(
                'model'=>\$model,
            )); ?>\n"; ?>
        </div>
        <!-- search-form -->
<hr class="clear">
        <?php echo "<?php"; ?> $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
                        'type' => BsHtml::GRID_TYPE_HOVER,
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
        <?php
        $count = 0;
        foreach ($this->tableSchema->columns as $column) {
            if (++$count == 7) {
                echo "\t\t/*\n";
            }
            if(!in_array($column->name,array('id','password')))
                echo "\t\t'" . $column->name . "',\n";
        }
        if ($count >= 7) {
            echo "\t\t*/\n";
        }
        ?>
				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
				),
			),
        )); ?>
    </div>
</div>




