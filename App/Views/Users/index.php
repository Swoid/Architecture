<?php use Core\Helpers\Html; ?>
<?php use Core\Helpers\Date; ?>

<main id="main">
    <div class="container">
        <div id="left">
            <?php foreach($ownPosts as $oPost): ?>
                <div class="post">
                    <div class="header">
                        <?= Html::img($user->avatar . '-m.png'); ?>
                        <span><?= $user->firstname . ' ' . $user->lastname; ?></span>
                        <?php if(isset($oPost->target)): ?>
                            <span><?= $oPost->target->firstname . ' ' . $oPost->target->lastname; ?></span>
                        <?php endif; ?>
                        <p class="date"><?= Date::dateToFr($oPost->date); ?></p>
                    </div>
                    <p class="main">
                        <?= $oPost->text; ?>
                    </p>
                    <div class="footer">
                        <button class="popup-button"><?= $oPost->comment_count; ?> commentaires</button>
                        <div class="popup">
                            <ul>
                                <?php foreach($oPost->comments as $comment): ?>
                                    <li>
                                        <img src="<?= ASSETS . 'img/' . $comment->avatar. '-s.png'; ?>" alt=""/>
                                        <span><?= $comment->text; ?></span>
                                        <span class="time"><?= date('H:i', strtotime($comment->date)); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <form action="<?= Html::href('comments/comment/' . $oPost->p_id); ?>" method="post">
                                <input type="text" name="text">
                                <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="right">
            <div class="publish friend">
                <?= Html::img($_SESSION['username'] . '-m.png'); ?>
                <?php if($user->id == $_SESSION['id']): ?>
                    <form class="expandable" action="<?= Html::href('posts/selfPublish/'); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="text" name="text" placeholder="Publier un message ...">
                            <input type="file" name="image" id="image"/>
                            <input type="submit">
                        </div>
                    </form>
                <?php else: ?>
                    <form class="expandable" action="<?= Html::href('posts/friendPublish/' . $user->id); ?>" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="text" name="text" placeholder="Publier un message sur la page de <?= $user->firstname; ?> ..." >
                            <input type="file" name="image" id="image"/>
                            <input type="submit">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <?php foreach($recevedPosts as $rPost): ?>
                <div class="post friend">
                    <div class="header">
                        <?= Html::img($rPost->avatar . '-m.png'); ?>
                        <span class="first"><?= $rPost->firstname . ' ' . $rPost->lastname; ?></span>
                        <span><?= $user->firstname . ' ' . $user->lastname; ?></span>
                        <p class="date"><?= Date::dateToFr($rPost->date); ?></p>
                    </div>
                    <p class="main">
                        <?= $rPost->text; ?>
                    </p>
                    <div class="footer">
                        <button class="popup-button"><?= $rPost->comment_count; ?> commentaires</button>
                        <div class="popup">
                            <ul>
                                <?php foreach($rPost->comments as $comment): ?>
                                    <li>
                                        <img src="<?= ASSETS . 'img/' . $comment->avatar. '-s.png'; ?>" alt=""/>
                                        <span><?= $comment->text; ?></span>
                                        <span class="time"><?= date('H:i', strtotime($comment->date)); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <form action="<?= Html::href('comments/comment/' . $rPost->p_id); ?>" method="post">
                                <input type="text" name="text">
                                <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>