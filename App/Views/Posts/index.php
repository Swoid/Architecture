<?php use Core\Helpers\Html; ?>
<div id="left">
    <?php foreach($posts as $post): ?>
        <div class="post">
            <div class="header">
                <?= Html::img('avatar-medium.png'); ?>
                <span><?= $post->firstname . ' ' . $post->lastname; ?> <?= isset($post->target) ? '-> ' . $post->target->firstname . ' ' . $post->target->lastname  :''; ?></span>
                <p class="date"><?= $post->date; ?></p>
            </div>
            <p class="main">
                <?= $post->text; ?>
            </p>
            <div class="footer">
                <button class="popup-button"><?= $post->comment_count; ?> commentaires</button>
                <div class="popup">
                    <ul>
                        <li>
                            <?php foreach($post->comments as $comment): ?>
                                <?= Html::img('avatar.png'); ?>
                                <span><?= $comment->text; ?></span>
                                <span class="time"><?= $comment->date; ?></span>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                    <form>
                        <input type="text">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div id="right">
    <div class="post">
        <div class="header">
            <?= Html::img('avatar-medium.png'); ?>
            <span>Jérémy Smith</span>
            <p class="date">Le 1 mars 2015 à 09:34</p>
        </div>
        <p class="main">
            Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood! It's a T. It goes "tuh". Humans dating robots is sick.
        </p>
        <div class="footer">
            <button class="popup-button">6 commentaires</button>
            <div class="popup">
                <ul>
                    <li>
                        <?= Html::img('avatar.png'); ?>
                        <span>Message bidon</span>
                        <span class="time">16:32</span>
                    </li>
                    <li>
                        <?= Html::img('avatar.png'); ?>
                        <span>Message bidon</span>
                        <span class="time">16:32</span>
                    </li>
                    <li>
                        <?= Html::img('avatar.png'); ?>
                        <span>Message bidon</span>
                        <span class="time">16:32</span>
                    </li>
                </ul>
                <form>
                    <input type="text">
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
    <div class="post">
        <div class="header">
            <?= Html::img('avatar-medium.png'); ?>
            <span>Jérémy Smith</span>
            <p class="date">Le 1 mars 2015 à 09:34</p>
        </div>
        <p class="main">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.
        </p>
        <div class="footer">
            <button class="popup-button">6 commentaires</button>
            <div class="popup">
                <ul>
                    <li>
                        <?= Html::img('avatar.png'); ?>
                        <span>Message bidon</span>
                        <span class="time">16:32</span>
                    </li>
                    <li>
                        <?= Html::img('avatar.png'); ?>
                        <span>Message bidon</span>
                        <span class="time">16:32</span>
                    </li>
                    <li>
                        <?= Html::img('avatar.png'); ?>
                        <span>Message bidon</span>
                        <span class="time">16:32</span>
                    </li>
                </ul>
                <form>
                    <input type="text">
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
</div>