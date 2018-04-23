<?php
/* @var $this GroupParticipantController */
/* @var $model GroupParticipant */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'group_participant_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'group_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'participant_id'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton(Yii::t('t','Search'),  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
