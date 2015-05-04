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
                    <button class="popup-button"></button>
                    <ul class="popup">

                    </ul>
                </div>
                <div class="notifications">
                    <button class="popup-button">3</button>
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
            <?= Html::img($_SESSION['username'] . '-m.png'); ?>
            <form class="expandable" action="<?= Html::href('posts/selfPublish'); ?>" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="text" placeholder="Publier un message ...">
                    <input type="file" name="image" id="image"/>
                    <input type="submit">
                </div>
            </form>
        </div>
        <?= $this->Session->flash(); ?>
        <?= $layout_content; ?>
    </div>
</main>
<?= $this->element('footer'); ?>