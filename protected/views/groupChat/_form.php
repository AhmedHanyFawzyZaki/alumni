<?php
/* @var $this GroupChatController */
/* @var $model GroupChat */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'group-chat-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    'layout'=>'horizontal',
)); ?>

    <div class="panel clear">
        <div class="panel-heading">
            <p class="help-block"><?php echo Yii::t('t','Fields with');?> <span class="required">*</span> <?php echo Yii::t('t','are required');?>.</p>

            <?php echo $form->errorSummary($model); ?>

        </div>
        <div class="panel-body">
    
    <?php echo $form->textFieldControlGroup($model,'group_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'user_id'); ?>
    <?php echo $form->textFieldControlGroup($model,'msg',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'date_created'); ?>
            
        </div>
        <div class="panel-footer text-right">

    <?php echo BsHtml::submitButton(Yii::t('t',$model->isNewRecord ? 'Save' : 'Update'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
        </div>
<?php $this->endWidget(); ?>
</div>