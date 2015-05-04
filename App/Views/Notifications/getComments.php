<?php use Core\Helpers\Html; ?>
<?php if(empty($notifs)): ?>
    <li>
       <span>Pas de nouvelle notifications</span>
    </li>
<?php else: ?>
    <?php foreach($notifs as $notif): ?>
        <li>
            <a href="<?= Html::href('posts/view/' . $notif->post_id); ?>">
                <?= Html::img($notif->avatar . '-s.png'); ?>
                <span><?= $notif->text; ?></span>
                <span class="time"><?= date('H:i', strtotime($notif->date)); ?></span>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif; ?>