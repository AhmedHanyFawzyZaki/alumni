<?php
/* @var $this ParticipationStatusController */
/* @var $model ParticipationStatus */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'participation-status-form',
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
    
    <?php echo $form->textFieldControlGroup($model,'participation_status_name',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'participation_status_name_ar',array('maxlength'=>255)); ?>
            
        </div>
        <div class="panel-footer text-right">

    <?php echo BsHtml::submitButton(Yii::t('t',$model->isNewRecord ? 'Save' : 'Update'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
        </div>
<?php $this->endWidget(); ?>
</div>