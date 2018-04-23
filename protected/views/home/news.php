<div class="row">
    <img src="<?= Yii::app()->request->baseUrl ?>/files/uploads/settings/<?= Yii::app()->params['news_banner'] ?>" style="width:100%;">
</div>
<div class="row margin">
    <div class="container">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-newspaper-o"></i>
                <h3 class="box-title"><b><?= Yii::t('t', 'News') ?></b></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php
                    if ($news) {
                        foreach ($news as $nw) {
                            ?>
                            <div class="col-md-4">
                                <div class="news-div">
                                    <img class="width100per" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/news/<?= $nw->image ?>"> 
                                    <p class="news-title"><?= Helper::getTranslatedName($nw, 'news_name') ?></p>
                                    <div class="news-overlay">
                                        <a href="<?= Yii::app()->request->getBaseUrl() ?>/_newsDetails/<?= $nw->news_url ?>" class="ghost-btn pull-left"><?= Yii::t('t', 'More') ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!--<div class="box-footer clearfix text-center">
                <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>-->
        </div>
    </div>
</div>