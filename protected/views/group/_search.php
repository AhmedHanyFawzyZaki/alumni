<?php
/* @var $this GroupController */
/* @var $model Group */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php //echo $form->textFieldControlGroup($model,'group_id'); ?>
<?php echo $form->textFieldControlGroup($model, 'group_name', array('maxlength' => 255)); ?>
<?php echo $form->dropDownListControlGroup($model, 'created_by', User::model()->getUsers(), array('empty' => ' ')); ?>
<?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 6)); ?>
<?php //echo $form->textFieldControlGroup($model,'date_created');  ?>
<?php //echo $form->textFieldControlGroup($model,'image',array('maxlength'=>255));  ?>

<div class="form-actions clear">
    <?php echo BsHtml::submitButton(Yii::t('t', 'Search'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY,)); ?>
</div>

<?php $this->endWidget(); ?>
