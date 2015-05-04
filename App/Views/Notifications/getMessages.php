<?php use Core\Helpers\Html; ?>
<?php foreach($notifs as $notif): ?>
    <li>
        <a href="<?= Html::href('messages/conversation/' . $notif->author_id); ?>">
            <?= Html::img('swoid'); ?>
            <span><?= $notif->author_id; ?></span>
            <span class="time">16:32</span>
        </a>
    </li>
<?php endforeach; ?>