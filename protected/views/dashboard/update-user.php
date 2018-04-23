<?php
$this->pageTitle = Yii::t('t', CHtml::encode(Yii::app()->name)) . ' - ' . Yii::t('t', 'Profile');
?>
<?php
if (Yii::app()->user->hasFlash('done')) {
    ?>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="content-header">
            <div class="alert alert-success text-center">
                <b><?= Yii::t('t', 'Done!') ?></b> <?= Yii::app()->user->getFlash('done'); ?>
            </div>
        </div>
    </div>
    <?php
}
$this->renderPartial('//user/_form', array('model' => $model));
?>