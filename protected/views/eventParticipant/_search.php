<?php
/* @var $this EventParticipantController */
/* @var $model EventParticipant */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'event_participant_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'event_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'participant_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'participant_status'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton(Yii::t('t','Search'),  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
