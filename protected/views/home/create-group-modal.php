<div class="modal" id="groupModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= Yii::t('t', 'Create Group') ?></h4>
            </div>
            <?php
            $group = new Group;
            $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                'id' => 'group-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'onsubmit' => "return false;", /* Disable normal form submit */
                //'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
                ),
            ));
            ?>
            <div class="modal-body">
                <div id="group-error-div"></div>
                <?php
                echo $form->textFieldControlGroup($group, 'group_name');
                echo $form->textAreaControlGroup($group, 'description', array('placeHolder' => Yii::t('t', 'Description')));
                ?>
                <?php echo $form->fileFieldControlGroup($group, 'image'); ?>
            </div>
            <div class="modal-footer">
                <?php echo CHtml::submitButton(Yii::t('t', 'Save'), array('class' => 'btn btn-primary', 'onclick' => 'createGroup();')); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    function createGroup()
    {

        var data = $("#group-form").serialize();

        var formData = new FormData($("#group-form")[0]);

        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("home/createGroup"); ?>',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (data) {
                data = jQuery.parseJSON(data);
                if (data.status == 1)
                    window.location = '<?= Yii::app()->request->getBaseUrl() ?>/_groups';
                else
                    $('#group-error-div').html(data['errors']);
            },
        });

    }

</script>