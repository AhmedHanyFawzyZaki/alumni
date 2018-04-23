<div class="row">
    <img src="<?= Yii::app()->request->baseUrl ?>/files/uploads/settings/<?= Yii::app()->params['home_banner'] ?>" style="width:100%;">
</div>
<div class="row margin">
    <div class="container">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-newspaper-o"></i>
                <h3 class="box-title"><b><?= Yii::t('t', 'Latest News') ?></b></h3>
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
            <div class="box-footer clearfix text-center">
                <a class="btn btn-primary" href="<?= Yii::app()->request->getBaseUrl() ?>/_news"><?= Yii::t('t', 'More news ...') ?> </a>
            </div>
        </div>
    </div>
</div>

<div class="row margin">
    <div class="container">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title"><b><?= Yii::t('t', 'Upcoming Events') ?><b></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php
                    if ($events) {
                        foreach ($events as $ev) {
                            ?>
                            <div class="col-md-4">
                                <div class="event-div">
                                    <img class="width100per" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/events/<?= $ev->image ?>"> 
                                    <p class="event-title"><?= Helper::getTranslatedName($ev, 'event_name') ?></p>
                                    <div class="event-overlay">
                                        <a href="<?= Yii::app()->request->getBaseUrl() ?>/_eventDetails/<?= $ev->event_url ?>" class="ghost-btn pull-left"><?= Yii::t('t', 'Discover') ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="box-footer clearfix text-center">
                <a class="btn btn-danger" href="<?= Yii::app()->request->getBaseUrl() ?>/_events"><?= Yii::t('t', 'More events ...') ?> </a>
            </div>
        </div>
    </div>
</div>