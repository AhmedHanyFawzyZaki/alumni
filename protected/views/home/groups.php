<div class="row">
    <img src="<?= Yii::app()->request->baseUrl ?>/files/uploads/settings/<?= Yii::app()->params['groups_banner'] ?>" style="width:100%;">
</div>

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
                    if ($groups) {
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
                    }
                    ?>
                </div>
            </div>
            <div class="box-footer clearfix">
                <?php
                if (Yii::app()->user->isGuest) {
                    ?>
                    <a href="#" class="btn btn-danger pull-left" data-toggle="modal" data-target="#loginModal"><?= Yii::t('t', 'Create New Group') ?></a>
                    <?php
                } else {
                    $this->renderPartial('//home/create-group-modal')
                    ?>
                    <a href="#" class="btn btn-danger pull-left" data-toggle="modal" data-target="#groupModal"><?= Yii::t('t', 'Create New Group') ?></a> 
                    <?php
                }
                ?>
                <!--<div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
</div>