<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id' => 'settings-form',
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

        <?php echo $form->textFieldControlGroup($model, 'app_name', array('maxlength' => 255)); ?>
        <?php echo $form->textFieldControlGroup($model, 'email', array('maxlength' => 255)); ?>
        <?php echo $form->textFieldControlGroup($model, 'phone', array('maxlength' => 255)); ?>
        <?php echo $form->textFieldControlGroup($model, 'address', array('maxlength' => 255)); ?>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'logo');

            if (!$model->isNewRecord && $model->logo != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->logo, 'logo', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'home_banner');

            if (!$model->isNewRecord && $model->home_banner != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->home_banner, 'home_banner', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'news_banner');

            if (!$model->isNewRecord && $model->news_banner != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->news_banner, 'news_banner', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'events_banner');

            if (!$model->isNewRecord && $model->events_banner != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->events_banner, 'events_banner', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'volunteer_work_banner');

            if (!$model->isNewRecord && $model->volunteer_work_banner != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->volunteer_work_banner, 'volunteer_work_banner', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'groups_banner');

            if (!$model->isNewRecord && $model->groups_banner != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->groups_banner, 'groups_banner', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="form-image">
            <?php
            echo $form->fileFieldControlGroup($model, 'training_course_banner');

            if (!$model->isNewRecord && $model->training_course_banner != '') {
                echo "<p class='clear'>" . CHtml::image(Yii::app()->request->getBaseUrl() . '/files/uploads/settings/' . $model->training_course_banner, 'training_course_banner', array('width' => 140)) . "</p>";
            }
            ?>
        </div>
        <div class="clear"></div>
        <?php echo $form->textFieldControlGroup($model, 'facebook_link', array('maxlength' => 255)); ?>
        <?php echo $form->textFieldControlGroup($model, 'twitter_link', array('maxlength' => 255)); ?>
        <?php echo $form->textFieldControlGroup($model, 'google_link', array('maxlength' => 255)); ?>

    </div>
    <div class="panel-footer text-right">

        <?php echo BsHtml::submitButton(Yii::t('t', $model->isNewRecord ? 'Save' : 'Update'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>