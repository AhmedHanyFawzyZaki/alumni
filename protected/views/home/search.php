<div class="row">
    <img src="<?= Yii::app()->request->baseUrl ?>/files/img/search.jpg" style="width:100%;">
</div>

<?php
$empty = 1;
if ($users) {
    $empty = 0;
    ?>
    <div class="row margin">
        <div class="container">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title"><b><?= Yii::t('t', 'Alumni') ?></b></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        foreach ($users as $us) {
                            ?>
                            <div class="col-sm-6">
                                <div class="group-div pull-left">
                                    <div class="col-xs-3">
                                        <img class="group-image" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/users/<?= $us->image ?>"> 
                                    </div>
                                    <div class="col-xs-5">
                                        <p class="group-title"><b><?= $us->user_name ?></b></p>
                                        <small><i><?= $us->major ?></i></small>
                                        <small><i><?= $us->graduation_year ?></i></small>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="<?= Yii::app()->request->getBaseUrl() ?>/home/profile?code=<?= urlencode(Helper::encryptAlgo($us->user_id)) ?>" class="btn btn-github pull-right"><?= Yii::t('t', 'Profile') ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

if ($groups) {
    $empty = 0;
    ?>
    <div class="row margin">
        <div class="container">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title"><b><?= Yii::t('t', 'Groups') ?></b></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        foreach ($groups as $gr) {
                            $grcount = GroupParticipant::model()->countByAttributes(array('group_id' => $gr->group_id));
                            if (!Yii::app()->user->isGuest) {
                                $isJoined = GroupParticipant::model()->countByAttributes(array('group_id' => $gr->group_id, 'participant_id' => Yii::app()->user->id));
                                $grbtn = $isJoined ? Yii::t('t', 'View') : Yii::t('t', 'Join');
                                $grbtn = '<a href="' . Yii::app()->request->getBaseUrl() . '/home/groupRoom/' . $gr->group_id . '" class="btn btn-primary pull-right">' . $grbtn . '</a>';
                            } else {
                                $grbtn = '<a href="#" data-toggle="modal" data-target="#loginModal" class="btn btn-primary pull-right">' . Yii::t('t', 'Join') . '</a>';
                            }
                            ?>
                            <div class="col-sm-6">
                                <div class="group-div pull-left">
                                    <div class="col-xs-3">
                                        <img class="group-image" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/groups/<?= $gr->image ?>"> 
                                    </div>
                                    <div class="col-xs-5">
                                        <p class="group-title"><?= $gr->group_name ?></p>
                                        <p class="group-members"><small><?= $grcount . ' ' . Yii::t('t', 'members') ?></small></p>
                                    </div>
                                    <div class="col-xs-4">
                                        <?= $grbtn ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
if ($news) {
    $empty = 0;
    ?>
    <div class="row margin">
        <div class="container">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-newspaper-o"></i>
                    <h3 class="box-title"><b><?= Yii::t('t', 'News') ?></b></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        foreach ($news as $nw) {
                            ?>
                            <div class="col-sm-6">
                                <div class="group-div pull-left">
                                    <div class="col-xs-3">
                                        <img class="group-image" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/news/<?= $nw->image ?>"> 
                                    </div>
                                    <div class="col-xs-5">
                                        <p class="group-title"><?= Helper::getTranslatedName($nw, 'news_name') ?></p>
                                        <p class="group-members"><small><?= Helper::getDateTime($nw->date_created) ?></small></p>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="<?= Yii::app()->request->getBaseUrl() ?>/_newsDetails/<?= $nw->news_url ?>" class="btn btn-danger pull-right"><?= Yii::t('t', 'Read') ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
if ($courses) {
    $empty = 0;
    ?>
    <div class="row margin">
        <div class="container">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-book"></i>
                    <h3 class="box-title"><b><?= Yii::t('t', 'Training Courses') ?></b></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        foreach ($courses as $course) {
                            ?>
                            <div class="col-sm-6">
                                <div class="group-div pull-left">
                                    <div class="col-xs-3">
                                        <img class="group-image" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/courses/<?= $course->image ?>"> 
                                    </div>
                                    <div class="col-xs-5">
                                        <p class="group-title"><?= Helper::getTranslatedName($course, 'training_course_name') ?></p>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="<?= Yii::app()->request->getBaseUrl() ?>/_courseDetails/<?= $course->training_course_url ?>" class="btn btn-success pull-right"><?= Yii::t('t', 'More') ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
if ($works) {
    $empty = 0;
    ?>
    <div class="row margin">
        <div class="container">
            <div class="box box-default">
                <div class="box-header">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title"><b><?= Yii::t('t', 'Volunteer Works') ?></b></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        foreach ($works as $work) {
                            ?>
                            <div class="col-sm-6">
                                <div class="group-div pull-left">
                                    <div class="col-xs-3">
                                        <img class="group-image" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/works/<?= $work->image ?>"> 
                                    </div>
                                    <div class="col-xs-5">
                                        <p class="group-title"><?= Helper::getTranslatedName($work, 'volunteer_work_name') ?></p>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="<?= Yii::app()->request->getBaseUrl() ?>/_workDetails/<?= $work->volunteer_work_url ?>" class="btn btn-default pull-right"><?= Yii::t('t', 'More') ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
if ($events) {
    $empty = 0;
    ?>
    <div class="row margin">
        <div class="container">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title"><b><?= Yii::t('t', 'Events') ?></b></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php
                        foreach ($events as $ev) {
                            ?>
                            <div class="col-sm-6">
                                <div class="group-div pull-left">
                                    <div class="col-xs-3">
                                        <img class="group-image" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/events/<?= $ev->image ?>"> 
                                    </div>
                                    <div class="col-xs-5">
                                        <p class="group-title"><?= Helper::getTranslatedName($ev, 'event_name') ?></p>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="<?= Yii::app()->request->getBaseUrl() ?>/_eventDetails/<?= $ev->event_url ?>" class="btn btn-primary pull-right"><?= Yii::t('t', 'More') ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
if ($empty) {
    ?>
    <div class="row margin">
        <div class="container">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title"><b><?= Yii::t('t', 'SORRY') ?></b></h3><i class="fa fa-exclamation"></i>
                    <div class="container">
                        <?= Yii::t('t', 'Nothing found that matches your search criteria.') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>