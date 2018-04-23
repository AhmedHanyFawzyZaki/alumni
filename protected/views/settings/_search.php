<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id'); ?>
    <?php echo $form->textFieldControlGroup($model,'app_name',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'email',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'phone',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'address',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'logo',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'home_banner',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'news_banner',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'events_banner',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'volunteer_work_banner',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'groups_banner',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'training_course_banner',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'facebook_link',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'twitter_link',array('maxlength'=>255)); ?>
    <?php echo $form->textFieldControlGroup($model,'google_link',array('maxlength'=>255)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton(Yii::t('t','Search'),  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
