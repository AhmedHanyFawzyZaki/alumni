<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldControlGroup($model, 'page_name', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'page_name_ar', array('maxlength' => 255)); ?>
<?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 6)); ?>
<?php echo $form->textAreaControlGroup($model, 'description_ar', array('rows' => 6)); ?>
<?php echo $form->textFieldControlGroup($model, 'page_url', array('maxlength' => 255)); ?>
<div class="clear"></div>
<?php echo $form->checkBoxControlGroup($model, 'active'); ?>
<?php //echo $form->textFieldControlGroup($model,'date_created');   ?>


<div class="form-actions clear">
    <?php echo BsHtml::submitButton(Yii::t('t', 'Search'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY,)); ?>
</div>
<?php $this->endWidget(); ?>
