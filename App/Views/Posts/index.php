<?php use Core\Helpers\Html; ?>
<?php use Core\Helpers\Date; ?>

<div id="left">
    <?php foreach ($posts as $post): ?>
        <?php if ($post->i % 2 == 0): ?>
            <div class="post">
                <div class="header">
                    <img src="<?= ASSETS . 'img/' . $post->avatar . '-m.png'; ?>" alt="" width="59"/>
                    <span class="<?= isset($post->target) ? 'first' : ''; ?>"><?= $post->firstname . ' ' . $post->lastname; ?></span>
                    <span><?= isset($post->target) ? ' ' . $post->target->firstname . ' ' . $post->target->lastname : ''; ?></span>

                    <p class="date"><?= Date::dateToFr($post->date); ?></p>
                </div>
                <p class="main">
                    <?php if(!is_null($post->image)): ?>
                        <?= Html::img($post->image); ?>
                    <?php endif; ?>
                    <?= $post->text; ?>
                </p>

                <div class="footer">
                    <button class="popup-button"><?= $post->comment_count; ?> commentaires</button>
                    <div class="popup">
                        <ul>
                            <li>
                                <?php foreach ($post->comments as $comment): ?>
                                    <img src="<?= ASSETS . 'img/' . $comment->avatar. '-m.png'; ?>" alt="" width="43"/>
                                    <span><?= $comment->text; ?></span>
                                    <span class="time"><?= date('H:i', strtotime($comment->date)); ?></span>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                        <form action="<?= Html::href('comments/comment/' . $post->p_id . '/' . $post->target_id); ?>" method="post">
                            <input type="text" name="text">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<div id="right">
    <?php foreach ($posts as $post): ?>
        <?php if ($post->i % 2 != 0): ?>
            <div class="post">
                <div class="header">
                    <img src="<?= ASSETS . 'img/' . $post->avatar. '-m.png'; ?>" alt="" width="59"/>
                    <span class="<?= isset($post->target) ? 'first' : ''; ?>"><?= $post->firstname . ' ' . $post->lastname; ?></span>
                    <?= isset($post->target) ? '<span>' . $post->target->firstname . ' ' . $post->target->lastname . '</span>' : ''; ?>

                    <p class="date"><?= Date::dateToFr($post->date); ?></p>
                </div>
                <p class="main">
                    <?php if(!is_null($post->image)): ?>
                        <?= Html::img($post->image); ?>
                    <?php endif; ?>
                    <?= $post->text; ?>
                </p>

                <div class="footer">
                    <button class="popup-button"><?= $post->comment_count; ?> commentaires</button>
                    <div class="popup">
                        <ul>
                            <li>
                                <?php foreach ($post->comments as $comment): ?>
                                    <img src="<?= ASSETS . 'img/' . $comment->avatar. '-m.png'; ?>" alt="" width="43"/>
                                    <span><?= $comment->text; ?></span>
                                    <span class="time"><?= date('H:i', strtotime($comment->date)); ?></span>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                        <form action="<?= Html::href('comments/comment/' . $post->p_id . '/' . $post->target_id); ?>" method="post">
                            <input type="text" name="text">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>