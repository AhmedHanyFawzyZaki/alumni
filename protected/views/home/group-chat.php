<?php
if ($chats) {
    foreach ($chats as $ch) {
        $dir = $ch->user_id == Yii::app()->user->id ? 'right' : '';
        ?>
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg <?=$dir?>">
            <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left"><?=$ch->user->user_name?></span>
                <span class="direct-chat-timestamp pull-right"><?= Helper::getDateTime($ch->date_created)?></span>
            </div><!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="<?= Yii::app()->request->getBaseUrl() ?>/files/uploads/users/<?=$ch->user->image?>" alt="message user image"><!-- /.direct-chat-img -->
            <div class="direct-chat-text">
                <?=$ch->msg?>
            </div><!-- /.direct-chat-text -->
        </div><!-- /.direct-chat-msg -->
        <?php
    }
} else {
    echo '<div class="text text-center alert alert-info">' . Yii::t('t', 'Be the first to send a message on this group.') . '</div>';
}
?>