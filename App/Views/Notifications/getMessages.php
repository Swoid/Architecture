<?php use Core\Helpers\Html; ?>
<?php if(empty($notifs)): ?>
    <li>
       <span>Pas de nouvelle notifications</span>
    </li>
<?php else: ?>
    <?php foreach($notifs as $notif): ?>
        <li>
            <a href="<?= Html::href('messages/conversation/' . $notif->author_id); ?>">
                <?= Html::img($notif->avatar . '-s.png'); ?>
                <span><?= $notif->text; ?></span>
                <span class="time">16:32</span>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif; ?>