<style>
    span.required {
        display: none;
    }
    #login-error-div, #register-error-div{
        color: red;
    }
</style>
<div class="modal" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= Yii::t('t', 'Login') ?></h4>
            </div>
            <?php
            $model = new LoginForm;
            $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                'id' => 'login-form',
                'action' => Yii::app()->request->getBaseUrl() . '/home/login',
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'onsubmit' => "return false;", /* Disable normal form submit */
                    //'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                ),
            ));
            ?>
            <div class="modal-body">
                <?php
                echo $form->textFieldControlGroup($model, 'username', array('append' => BsHtml::icon(BsHtml::GLYPHICON_ENVELOPE), 'placeHolder' => Yii::t('t', 'Email')));
                ?>
                <?php
                echo $form->passwordFieldControlGroup($model, 'password', array('append' => BsHtml::icon(BsHtml::GLYPHICON_LOCK), 'placeHolder' => Yii::t('t', 'Password')));
                ?>
                <div id="login-error-div"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-toggle="modal" data-target="#forgotModal"><?= Yii::t('t', 'Forgot Password') ?></button>
                <?php echo CHtml::submitButton(Yii::t('t', 'Login'), array('class' => 'btn btn-primary', 'onclick' => 'send();')); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    function send()
    {

        var data = $("#login-form").serialize();

        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("home/login"); ?>',
            data: data,
            success: function (data) {
                data=jQuery.parseJSON(data);
                if(data.status==1)
                    window.location = '<?= Yii::app()->request->getBaseUrl() ?>/' + data['path'];
                else
                    $('#login-error-div').html(data['msg']);
            },
            /*error: function (data) { // if error occured
             alert("Error occured.please try again");
             alert(data);
             },
             
             dataType: 'html'*/
        });

    }

</script>