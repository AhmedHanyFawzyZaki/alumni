<div class="row">
    <div class="container">
        <img src="<?= Yii::app()->request->baseUrl ?>/files/uploads/pages/<?= $model->image ?>" style="width:100%;">
    </div>
</div>

<div class="row margin">
    <div class="container">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="text-center">
                    <i class="fa fa-pagelines"></i> <?= Helper::getTranslatedName($model, 'page_name') ?> <i class="fa fa-pagelines"></i>
                </h3>
            </div>
            <div class="box-body text-center">
                <p>
                    <?= Helper::getTranslatedName($model, 'description') ?>
                </p>
                <br><br>
            </div>
        </div>
    </div>
</div>