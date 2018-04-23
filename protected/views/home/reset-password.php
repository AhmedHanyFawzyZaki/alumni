<div class="row clear">
    <div class="container">
        <div class="box margin">
            <div class="box-header">
                <h3 class="text-center">
                    <i class="fa fa-pagelines"></i> <?= Yii::t('t', 'Password Reset') ?> <i class="fa fa-pagelines"></i>
                </h3>
            </div>
            <div class="box-body text-center">
                <style>
                    .form-control{
                        width: 50%;
                        margin: 0 25%;
                    }
                </style>

                <?php
                $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                    'id' => 'user-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        //'layout' => 'horizontal',
                ));
                ?>

                <div class="panel clear">
                    <div class="panel-body">

                        <?php echo $form->passwordFieldControlGroup($model, 'password', array('maxlength' => 255)); ?>
                        <?php echo $form->passwordFieldControlGroup($model, 'password_confirmation', array('maxlength' => 255)); ?>

                    </div>
                    <div class="panel-footer text-right">

                        <?php echo BsHtml::submitButton(Yii::t('t', 'Save'), array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>