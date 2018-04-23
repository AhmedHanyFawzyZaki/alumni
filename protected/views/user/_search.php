<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php //echo $form->textFieldControlGroup($model,'user_id'); ?>
<?php echo $form->dropDownListControlGroup($model, 'user_type_id', UserType::model()->getTypes(), array('empty' => ' ')); ?>
<?php echo $form->textFieldControlGroup($model, 'user_name', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'national_id', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'email', array('maxlength' => 255)); ?>
<?php //echo $form->textFieldControlGroup($model,'image',array('maxlength'=>255)); ?>
<?php echo $form->textFieldControlGroup($model, 'first_name', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'last_name', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'phone', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'major', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'graduation_year', array('maxlength' => 255)); ?>
<div class="clear"></div>
<?php echo $form->checkBoxControlGroup($model, 'active'); ?>
<?php //echo $form->textFieldControlGroup($model,'date_created');   ?>


<div class="form-actions clear">
    <?php echo BsHtml::submitButton(Yii::t('t', 'Search'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY,)); ?>
</div>

<?php $this->endWidget(); ?>
