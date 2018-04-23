<div class="row">
    <img src="<?= Yii::app()->request->baseUrl ?>/files/uploads/settings/<?= Yii::app()->params['events_banner'] ?>" style="width:100%;">
</div>

<div class="row margin">
    <div class="container">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title"><b><?= Yii::t('t', 'Events') ?></b></h3>
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