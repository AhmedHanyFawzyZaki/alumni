<?php
/* @var $this TrainingCourseController */
/* @var $model TrainingCourse */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldControlGroup($model, 'training_course_name', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'training_course_name_ar', array('maxlength' => 255)); ?>
<?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 6)); ?>
<?php echo $form->textAreaControlGroup($model, 'description_ar', array('rows' => 6)); ?>
<?php echo $form->textFieldControlGroup($model, 'place', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'place_ar', array('maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'price', array('maxlength' => 10, 'append' => Yii::app()->params['currency'])); ?>
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

<div class="clear"></div>
<?php echo $form->checkBoxControlGroup($model, 'active'); ?>

<div class="clear"></div>
<div class="form-actions">
    <?php echo BsHtml::submitButton(Yii::t('t', 'Search'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY,)); ?>
</div>

<?php $this->endWidget(); ?>
