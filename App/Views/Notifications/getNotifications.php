<?php use Core\Helpers\Html; ?>
<?php if(empty($comments) && empty($friends) && empty($posts)): ?>
    <li>
       <span>Pas de nouvelle notifications</span>
    </li>
<?php else: ?>
    <?php foreach($comments as $comment): ?>
        <li>
            <a href="<?= Html::href('posts/view/' . $comment->post_id); ?>">
                <?= Html::img($comment->avatar . '-s.png'); ?>
                <span><?= $comment->text; ?></span>
                <span class="time"><?= date('H:i', strtotime($comment->date)); ?></span>
            </a>
        </li>
    <?php endforeach; ?>
    <?php foreach($posts as $post): ?>
        <li>
            <a href="<?= Html::href('posts/view/' . $post->id); ?>">
                <?= Html::img($post->avatar . '-s.png'); ?>
                <span><?= $post->text; ?></span>
                <span class="time"><?= date('H:i', strtotime($post->date)); ?></span>
            </a>
        </li>
    <?php endforeach; ?>
    <?php foreach($friends as $friend): ?>
        <li>
            <a href="<?= Html::href('users/index/' . $friend->id); ?>">
                <?= Html::img($friend->avatar . '-s.png'); ?>
                <span><?= $friend->firstname . ' ' . $friend->lastname ; ?> voudrait être votre ami.</span>
                <span class="time"><?= date('H:i', strtotime($friend->date)); ?></span>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif; ?>