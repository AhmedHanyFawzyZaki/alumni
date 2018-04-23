<div class="modal" id="forgotModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= Yii::t('t', 'Forgot Password') ?></h4>
            </div>
            <form action="<?=Yii::app()->request->getBaseUrl()?>/home/forgotPassword" method="post">
                <div class="modal-body">

                    <div class="form-group"> 
                        <label for="recipient-name" class="control-label"><?= Yii::t('t', 'Email') ?>:</label> 
                        <input type="text" required="" name="email" class="form-control" placeholder="<?= Yii::t('t', 'Email') ?>"> 
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-toggle="modal" data-target="#loginModal"><?= Yii::t('t', 'Login') ?></button>
                    <button type="submit" class="btn btn-primary"><?= Yii::t('t', 'Reset') ?></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->