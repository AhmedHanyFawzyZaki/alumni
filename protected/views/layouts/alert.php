<div id="alert-div" class="col-lg-6 col-lg-offset-3">
    <?php
    if (Yii::app()->user->hasFlash('wrong')) {
        ?>
        <div class="alert alert-danger alert-dismissible marginTop15" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::app()->user->getFlash('wrong') ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (Yii::app()->user->hasFlash('success')) {
        ?>
        <div class="alert alert-success alert-dismissible marginTop15" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::app()->user->getFlash('success') ?>
        </div>
        <?php
    }
    ?>
    <?php
    if (Yii::app()->user->hasFlash('info')) {
        ?>
        <div class="alert alert-info alert-dismissible marginTop15"role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::app()->user->getFlash('info') ?>
        </div>
        <?php
    }
    ?>
</div>