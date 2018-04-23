<script type="text/javascript">var switchTo5x = true;</script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=6269aa7f-a4c0-4854-9b77-73e1f74d5a30"></script>
<script type="text/javascript">stLight.options({publisher: "6269aa7f-a4c0-4854-9b77-73e1f74d5a30", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<div class="row">
    <div class="container marginTop40">
        <div class="box">
            <div class="box-body">
                <div class="container-fluid">
                    <div class="col-md-5">
                        <div class="col-md-12 article-image">
                            <img class="width100per" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/events/<?= $model->image ?>"> 
                        </div>
                        <div class="col-md-12 text-center">
                            <span class='st_sharethis_large' displayText='ShareThis'></span>
                            <span class='st_facebook_large' displayText='Facebook'></span>
                            <span class='st_twitter_large' displayText='Tweet'></span>
                            <span class='st_linkedin_large' displayText='LinkedIn'></span>
                            <span class='st_pinterest_large' displayText='Pinterest'></span>
                            <span class='st_email_large' displayText='Email'></span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h2 class="article-title"><?= Helper::getTranslatedName($model, 'event_name') ?></h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="article-date clearfix"><b><?=Yii::t('t','From')?>:</b> &nbsp;&nbsp;<?= Helper::getDateTime($model->date_start) ?></span>
                                <span class="article-date clearfix"><b><?=Yii::t('t','To')?>:</b> &nbsp;&nbsp;<?= Helper::getDateTime($model->date_end) ?></span>
                                <span class="article-date clearfix"><i class="fa fa-map-marker"></i> <b><?= Yii::t('t', 'Place') ?>:</b> &nbsp;&nbsp;<?= Helper::getTranslatedName($model, 'place') ?></span>
                            </div>
                            <!--<div class="col-sm-6">
                                <a href="javascript:participate('Going')" class="bg-green"><span class="join-btn" id="going-label"><?= $isGoing ?></span></a>
                                <a href="javascript:participate('Interested')" class="bg-blue"><span class="join-btn" id="interested-label"><?= $isInterested ?></span></a>
                                <span class="article-date clearfix"><i class="fa fa-check"></i> <b><?= Yii::t('t', 'Going') ?>:</b> &nbsp;&nbsp;<em id="going-num"><?= $going ?></em></span>
                                <span class="article-date clearfix"><i class="fa fa-circle-o-notch"></i> <b><?= Yii::t('t', 'Interested') ?>:</b> &nbsp;&nbsp;<em id="interested-num"><?= $interested ?></em></span>
                            </div>-->
                        </div>
                        <p class="article-desc">
                            <?= Helper::getTranslatedName($model, 'description') ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function participate(status) {
        var login = "<?= Yii::app()->user->isGuest ?>";
        if (login) {
            $('#login-btn').click();
        } else {
            $.ajax({
                url: "<?= Yii::app()->request->getBaseUrl() ?>/home/eventParticipate",
                data: {event:"<?= $model->event_url ?>", status: status},
                type: 'POST',
                success: function (data) {
                    data = jQuery.parseJSON(data);
                    if (data['status'] == '1') {
                        $('#going-num').html(data['going']);
                        $('#interested-num').html(data['interested']);
                        $('#going-label').html(data['isGoing']);
                        $('#interested-label').html(data['isInterested']);
                    } else if (data['status'] == '2') {
                        $('#login-btn').click();
                    }
                }
            });
        }
    }
</script>