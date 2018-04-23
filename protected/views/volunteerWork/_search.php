<?php
/* @var $this VolunteerWorkController */
/* @var $model VolunteerWork */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldControlGroup($model, 'volunteer_work_name', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'volunteer_work_name_ar', array('maxlength' => 255)); ?>
<?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 6)); ?>
<?php echo $form->textAreaControlGroup($model, 'description_ar', array('rows' => 6)); ?>
<?php echo $form->textFieldControlGroup($model, 'place', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'place_ar', array('maxlength' => 255)); ?>

<div class="clear"></div>
<?php echo $form->checkBoxControlGroup($model, 'active'); ?>

<div class="clear"></div>
<div class="form-actions">
    <?php echo BsHtml::submitButton(Yii::t('t', 'Search'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY,)); ?>
</div>

<?php $this->endWidget(); ?>
