<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>

<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('t','$label')=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>'), 'url'=>array('index')),
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>Yii::t('t','Create <?php echo $this->class2name($this->modelClass); ?>'), 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-edit','label'=>Yii::t('t','Update <?php echo $this->class2name($this->modelClass); ?>'), 'url'=>array('update'<?php 
                                if(is_array($this->tableSchema->primaryKey)){
                                    foreach ($this->tableSchema->primaryKey as $key){
                                        echo ',"id['.$key.']"=>$model->'.$key;
                                    }
                                }else{
                                    echo ',"id"=>$model->'.$this->tableSchema->primaryKey;
                                } ?>)),
    array('icon' => 'glyphicon glyphicon-minus-sign','label'=>Yii::t('t','Delete <?php echo $this->modelClass; ?>'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete'<?php 
                                if(is_array($this->tableSchema->primaryKey)){
                                    foreach ($this->tableSchema->primaryKey as $key){
                                        echo ',"id['.$key.']"=>$model->'.$key;
                                    }
                                }else{
                                    echo ',"id"=>$model->'.$this->tableSchema->primaryKey;
                                } ?>),'confirm'=>Yii::t('t','Are you sure you want to delete this item?'))),
);

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'View <?php echo $this->class2name($this->modelClass); ?>');
?>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
    echo "\t\t'" . $column->name . "',\n";
}
?>
	),
)); ?>