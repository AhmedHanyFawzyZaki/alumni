<?php
/* @var $this ParticipationStatusController */
/* @var $model ParticipationStatus */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'participation_status_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'participation_status_name',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'participation_status_name_ar',array('maxlength'=>255)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton(Yii::t('t','Search'),  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
