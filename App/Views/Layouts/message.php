<?php use Core\Helpers\Html; use Core\Session; ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <?= Html::css('main'); ?>
</head>
<body id="private">
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
        <div class="user_info">
            <?= Html::img($target->avatar . '-l.png'); ?>
            <h1><?= $target->firstname . ' ' . $target->lastname; ?></h1>
        </div>
    </div>
</div>
<main id="main">
    <div class="container">
        <?= $this->Session->flash(); ?>
        <?= $layout_content; ?>
        <form action="<?= Html::href('messages/send/' . $target->id); ?>" method="post">
            <div>
                <input type="text" name="text" placeholder="Entrez votre message ...">
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</main>
<?= $this->element('footer'); ?>