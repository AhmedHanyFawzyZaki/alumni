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
$label = $this->pluralize($this->class2name($this->modelClass));
$m=$this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	Yii::t('t','$label')=>array('index'),
	Yii::t('t','Create $m'),
);\n";
?>

$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Create <?php echo $this->class2name($this->modelClass); ?>');

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>Yii::t('t','List <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>'), 'url'=>array('index')),
);
?>

<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>