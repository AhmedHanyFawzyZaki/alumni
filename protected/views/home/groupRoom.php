<script type="text/javascript">var switchTo5x = true;</script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=6269aa7f-a4c0-4854-9b77-73e1f74d5a30"></script>
<script type="text/javascript">stLight.options({publisher: "6269aa7f-a4c0-4854-9b77-73e1f74d5a30", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<div class="row">
    <div class="container marginTop40">
        <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
                <div class="col-lg-2 col-sm-3">
                    <img class="width100per" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/groups/<?= $model->image ?>"> 
                    <br><br>
                    <p class="text-center">
                        <a href="javascript:leaveGroup()" class="bg-red-active">
                            <span class="join-btn"><?= Yii::t('t', 'Leave') ?></span>
                        </a>
                    </p>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <h3 class="box-title"><b><?= $model->group_name ?></b></h3>
                    <p>
                        <?= $model->description ?>
                    </p>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="chat-div-cont">
                    <?php
                    $this->renderPartial('group-chat', array('chats' => $chats));
                    ?>
                </div><!--/.direct-chat-messages-->

            </div><!-- /.box-body -->
            <div class="box-footer">
                <?php
                $groupchat = new GroupChat;
                $groupchat->group_id = $model->group_id;
                $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                    'id' => 'group-chat-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array(
                        'onsubmit' => "return false;", /* Disable normal form submit */
                    //'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                    ),
                ));
                ?>
                <div class="input-group">
                    <?php echo $form->hiddenField($groupchat, 'group_id'); ?>
                    <?php echo $form->textField($groupchat, 'msg', array('placeholder' => Yii::t('t', 'Type Message ...'), 'class' => 'form-control')); ?>
                    <span class="input-group-btn">
                        <?php echo CHtml::submitButton(Yii::t('t', 'Send'), array('class' => 'btn btn-primary btn-flat', 'onclick' => 'sendChat();')); ?>
                    </span>
                </div>
                <?php $this->endWidget(); ?>
            </div><!-- /.box-footer-->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("home/checkChat/" . $model->group_id); ?>',
                success: function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.status == 1) {
                        $('#chat-div-cont').html(data.msg);
                    }
                },
            });
        }, 5000);
    });
    function sendChat()
    {

        var data = $("#group-chat-form").serialize();

        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("home/sendChat"); ?>',
            data: data,
            success: function (data) {
                data = jQuery.parseJSON(data);
                if (data.status == 1) {
                    $('#GroupChat_msg').val('');
                    $('#chat-div-cont').html(data.msg);
                }
            },
        });

    }

    function leaveGroup() {
        var x = confirm('<?= Yii::t('t', 'Are you sure you want to leave this group?') ?>');
        if (x) {
            window.location = '<?= Yii::app()->request->getBaseUrl() ?>/home/leaveGroup/<?= $model->group_id ?>';
                    }
                }

</script>