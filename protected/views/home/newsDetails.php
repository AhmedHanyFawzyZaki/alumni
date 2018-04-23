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
                            <img class="width100per" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/news/<?= $model->image ?>"> 
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
                        <h2 class="article-title"><?= Helper::getTranslatedName($model, 'news_name') ?></h2>
                        <span class="article-date"><b><?= Yii::t('t', 'Published') ?>:</b> &nbsp;&nbsp;<?= Helper::getDateTime($model->date_created) ?></span>
                        <p class="article-desc">
                            <?= Helper::getTranslatedName($model, 'description')?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>