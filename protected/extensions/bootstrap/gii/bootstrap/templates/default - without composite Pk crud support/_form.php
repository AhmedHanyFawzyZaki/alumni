<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form BSActiveForm */
<?php echo "?>\n"; ?>

<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'" . $this->class2id($this->modelClass) . "-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'layout'=>'horizontal',
)); ?>\n"; ?>

    <div class="panel clear">
        <div class="panel-heading">
            <p class="help-block"><?php echo "<?php echo Yii::t('t','Fields with');?>";?> <span class="required">*</span> <?php echo "<?php echo Yii::t('t','are required');?>";?>.</p>

            <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

        </div>
        <div class="panel-body">
    
<?php
foreach ($this->tableSchema->columns as $column) :
    if ($column->autoIncrement) {
        continue;
    }
    ?>
    <?php echo "<?php echo " . $this->generateActiveControlGroup($this->modelClass, $column) . "; ?>\n"; ?>
<?php endforeach; ?>
            
        </div>
        <div class="panel-footer text-right">

    <?php echo "<?php echo BsHtml::submitButton(Yii::t('t',\$model->isNewRecord ? 'Save' : 'Update'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>\n"; ?>
        </div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
</div>