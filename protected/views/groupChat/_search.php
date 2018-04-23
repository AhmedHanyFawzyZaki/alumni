<?php
/* @var $this GroupChatController */
/* @var $model GroupChat */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'group_chat_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'group_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'user_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'msg',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'date_created'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton(Yii::t('t','Search'),  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
