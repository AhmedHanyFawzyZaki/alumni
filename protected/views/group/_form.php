<?php
/* @var $this GroupController */
/* @var $model Group */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id' => 'group-form',
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

        <?php echo $form->textFieldControlGroup($model, 'group_name', array('maxlength' => 255)); ?>
        <?php echo $form->dropDownListControlGroup($model, 'created_by', User::model()->getUsers(), array('empty' => ' ')); ?>
        <?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 6)); ?>

        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'image');

            if (!$model->isNewRecord && $model->image != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/groups/' . $model->image, 'image', array('width' => 140)) . "</p>";
            }
            ?>
        </div>

    </div>
    <div class="panel-footer text-right">

        <?php echo BsHtml::submitButton(Yii::t('t', $model->isNewRecord ? 'Save' : 'Update'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>