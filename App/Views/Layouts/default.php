<?php use Core\Helpers\Html; ?>
    <!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <?= Html::css('main'); ?>
    </head>
<body>
<div id="header">
    <div class="container">
        <div class="nav">
            <a href="<?= Html::href('posts/index'); ?>">Accueil</a>
            <a href="<?= Html::href('users/logout'); ?>">Se déconnecter</a>

            <div class="search search-primary">
                <button class="popup-button">Search</button>
                <div class="popup">
                    <form>
                        <div>
                            <input type="search">
                            <input type="submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="messages">
                    <button class="hot popup-button">3</button>
                    <ul class="popup">
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
                </div>
                <div class="notifications">
                    <button class="hot popup-button">3</button>
                    <ul class="popup">
                        <li>
                            <?= Html::img('avatar.png'); ?>
                            <span>Notification bidon</span>
                            <span class="time">16:32</span>
                        </li>
                        <li>
                            <?= Html::img('avatar.png'); ?>
                            <span>Notification bidon</span>
                            <span class="time">16:32</span>
                        </li>
                        <li>
                            <?= Html::img('avatar.png'); ?>
                            <span>Notification bidon</span>
                            <span class="time">16:32</span>
                        </li>
                    </ul>
                </div>
                <a href="<?= Html::href('users/index/' . $_SESSION['id']); ?>"
                   class="username"><?= $_SESSION['username']; ?></a>
            </div>
        </div>
    </div>
</div>
<main id="main">
    <div class="container">
        <div class="publish">
            <?= Html::img('avatar-medium.png'); ?>
            <form>
                <div>
                    <input type="text" placeholder="Publier un message ...">
                    <input type="submit">
                </div>
            </form>
        </div>
        <?= $layout_content; ?>
    </div>
</main>
<?= $this->element('footer'); ?>