<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id' => 'event-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'layout' => 'horizontal',
        ));
?>

<div class="panel clear">
    <div class="panel-heading">
        <p class="help-block"><?php echo Yii::t('t', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('t', 'are required'); ?>.</p>

        <?php echo $form->errorSummary($model); ?>

    </div>
    <div class="panel-body">

        <?php echo $form->textFieldControlGroup($model, 'event_name', array('maxlength' => 255)); ?>
        <?php echo $form->textFieldControlGroup($model, 'event_name_ar', array('maxlength' => 255)); ?>
        <?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 6)); ?>
        <?php echo $form->textAreaControlGroup($model, 'description_ar', array('rows' => 6)); ?>
        <?php echo $form->textFieldControlGroup($model, 'place', array('maxlength' => 255)); ?>
        <?php echo $form->textFieldControlGroup($model, 'place_ar', array('maxlength' => 255)); ?>
        <?php //echo $form->textFieldControlGroup($model,'event_url',array('maxlength'=>255)); ?>
        <div class="form-group">
            <?php
            echo $form->labelEx($model, 'date_start', array('class' => 'control-label col-lg-4'));
            ?>
            <div class="col-lg-8">
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'date_start', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => '',
                    'htmlOptions' => array(
                        'placeHolder' => Yii::t('t', 'Start Date'),
                        'class' => 'form-control',
                    ),
                    'options' => array(
                        'dateFormat' => Yii::app()->params['dateFormatJS'],
                        //'showOtherMonths' => true, // Show Other month in jquery
                        //'selectOtherMonths' => true, // Select Other month in jquery
                        'changeMonth' => true,
                        'changeYear' => true,
                        'showButtonPanel' => true,
                    //'showSecond' => true,
                    //'regional' => '',
                    ) // jquery plugin options
                ));
                ?>
            </div>
        </div>
        <div class="form-group">
            <?php
            echo $form->labelEx($model, 'date_end', array('class' => 'control-label col-lg-4'));
            ?>
            <div class="col-lg-8">
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'date_end', //attribute name
                    'mode' => 'datetime', //use "time","date" or "datetime" (default)
                    'language' => '',
                    'htmlOptions' => array(
                        'placeHolder' => Yii::t('t', 'End Date'),
                        'class' => 'form-control',
                    ),
                    'options' => array(
                        'dateFormat' => Yii::app()->params['dateFormatJS'],
                        //'showOtherMonths' => true, // Show Other month in jquery
                        //'selectOtherMonths' => true, // Select Other month in jquery
                        'changeMonth' => true,
                        'changeYear' => true,
                        'showButtonPanel' => true,
                    //'showSecond' => true,
                    //'regional' => '',
                    ) // jquery plugin options
                ));
                ?>
            </div>
        </div>
        <?php //echo $form->textFieldControlGroup($model,'created_by'); ?>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'image');

            if (!$model->isNewRecord && $model->image != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/events/' . $model->image, 'image', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="clear"></div>
        <?php echo $form->checkBoxControlGroup($model, 'active'); ?>
        <?php //echo $form->textFieldControlGroup($model,'date_created');   ?>

    </div>
    <div class="panel-footer text-right">

        <?php echo BsHtml::submitButton(Yii::t('t', $model->isNewRecord ? 'Save' : 'Update'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>