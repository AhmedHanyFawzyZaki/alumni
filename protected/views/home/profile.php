<div class="row"></div>

<div class="row margin">
    <div class="container">
        <div class="box box-danger">
            <div class="box-header">
                <h2 class="text-center">
                    <?= Yii::t('t', 'Profile') ?>
                </h2>
            </div>
            <hr>
            <div class="box-header">
                <div class="col-md-4 text-center well">
                    <img style="max-width: 100%;" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/users/<?= $user->image ?>">
                    <br><br>
                    <?php
                    if ($isUpdate) {
                        $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                            'id' => 'update-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <div class="required"><?php echo $form->errorSummary($user); ?></div>
                        <p class="text-left"><b><?= Yii::t('t', 'Email') ?>:</b> <?php echo $form->textField($user, 'email'); ?></p>
                        <p class="text-left"><b><?= Yii::t('t', 'Username') ?>:</b> <?php echo $form->textField($user, 'user_name'); ?></p>
                        <p class="text-left"><b><?= Yii::t('t', 'Password') ?>:</b> <?php echo $form->passwordField($user, 'password'); ?></p>
                        <p class="text-left"><b><?= Yii::t('t', 'Phone') ?>:</b> <?php echo $form->textField($user, 'phone'); ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'National ID') ?>:</b> <?= $user->national_id ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'Major') ?>:</b> <?= $user->major ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'Graduation Year') ?>:</b> <?= $user->graduation_year ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <br>
                        <?php
                        echo CHtml::submitButton(Yii::t('t', 'Update'), array('class' => 'btn btn-primary'));
                        $this->endWidget();
                    } else {
                        ?>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'Email') ?>:</b> <?= $user->email ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'Username') ?>:</b> <?= $user->user_name ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'National ID') ?>:</b> <?= $user->national_id ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'Phone') ?>:</b> <?= $user->phone ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'Major') ?>:</b> <?= $user->major ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <p><b class="col-lg-5"><?= Yii::t('t', 'Graduation Year') ?>:</b> <?= $user->graduation_year ?: '<i class="bg-red">&nbsp;' . Yii::t('t', 'Not set') . '&nbsp;</i>' ?></p>
                        <?php
                    }
                    if (!Yii::app()->user->isGuest && !$isUpdate && Yii::app()->user->id == $user->user_id) {
                        ?>
                        <br>
                        <p><a class="btn btn-danger" href="<?= Yii::app()->request->getBaseUrl() ?>/home/updateProfile"><?= Yii::t('t', 'Update Profile') ?></a></p>
                        <?php
                    }
                    ?>
                    <!--<h3>
                        <i style="text-decoration: underline;"><?= $user->user_name ?></i>
                    </h3>-->
                </div>
                <div class="col-lg-7 col-lg-offset-1 well">
                    <?php
                    $empty = 1;
                    if ($courses) {
                        $empty = 0;
                        ?>
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
                                        <div class="col-sm-12">
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
                        <?php
                    }
                    ?>

                    <?php
                    if ($works) {
                        $empty = 0;
                        ?>
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
                                        <div class="col-sm-12">
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
                        <?php
                    }
                    ?>

                    <?php
                    if ($empty) {
                        ?>

                        <div class="alert alert-warning">
                            <h3 class="box-title"><b><?= Yii::t('t', 'Whoops') ?></b></h3>
                            <i class="fa fa-exclamation"></i>
                            <?= $user->user_name ?> <?= Yii::t('t', 'isn\'t participated in any training course or volunteer work.') ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>