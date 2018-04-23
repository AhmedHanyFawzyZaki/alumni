<div class="modal" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= Yii::t('t', 'Register') ?></h4>
            </div>
            <?php
            $register = new User;
            $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                'id' => 'register-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'onsubmit' => "return false;", /* Disable normal form submit */
                //'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                ),
            ));
            ?>
            <div class="modal-body">
                <div id="register-error-div"></div>
                <?php
                echo $form->textFieldControlGroup($register, 'user_name');
                echo $form->textFieldControlGroup($register, 'national_id');
                echo $form->textFieldControlGroup($register, 'major');
                echo $form->textFieldControlGroup($register, 'graduation_year');
                echo $form->passwordFieldControlGroup($register, 'password');
                echo $form->passwordFieldControlGroup($register, 'password_confirmation');
                echo $form->textFieldControlGroup($register, 'email');
                echo $form->textFieldControlGroup($register, 'phone');
                echo $form->fileFieldControlGroup($register, 'image');
                ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" required="" id="check-agree"> <?= Yii::t('t', 'I agree on') ?> 
                        <a target="_blank" href="<?= Yii::app()->request->getBaseUrl() ?>/terms-of-use-page"><?= Yii::t('t', 'terms of use') ?></a>.
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo CHtml::submitButton(Yii::t('t', 'Register'), array('class' => 'btn btn-primary', 'onclick' => 'register();')); ?>
            </div>
            <?php $this->endWidget(); ?>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    function register()
    {

        var data = $("#register-form").serialize();

        var formData = new FormData($("#register-form")[0]);

        if (document.getElementById('check-agree').checked) {
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("home/register"); ?>',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == 1)
                        window.location = '<?= Yii::app()->request->getBaseUrl() ?>/home';
                    else
                        $('#register-error-div').html(data['errors']);
                },
            });
        }

    }

</script>