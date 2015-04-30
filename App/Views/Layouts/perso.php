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
                            <img src="./img/avatar.png">
                            <span>Message bidon</span>
                            <span class="time">16:32</span>
                        </li>
                        <li>
                            <img src="./img/avatar.png">
                            <span>Message bidon</span>
                            <span class="time">16:32</span>
                        </li>
                        <li>
                            <img src="./img/avatar.png">
                            <span>Message bidon</span>
                            <span class="time">16:32</span>
                        </li>
                    </ul>
                </div>
                <div class="notifications">
                    <button class="hot popup-button">3</button>
                    <ul class="popup">
                        <li>
                            <img src="./img/avatar.png">
                            <span>Adrien Leloup a commenté votre statut</span>
                            <span class="time">16:32</span>
                        </li>
                        <li>
                            <img src="./img/avatar.png">
                            <span>Philip J. Fry a commenté votre statut</span>
                            <span class="time">16:32</span>
                        </li>
                        <li>
                            <img src="./img/avatar.png">
                            <span>Adrien Leloup vous a ajouté aux contacts</span>
                            <span class="time">16:32</span>
                        </li>
                    </ul>
                </div>
                <a href="<?= Html::href('users/index/' . $_SESSION['id']); ?>"
                   class="username"><?= $_SESSION['username']; ?></a>
            </div>
        </div>
        <div class="user_info">
            <?= Html::img($user->avatar . '-l.png'); ?>

            <h1><?= $user->firstname . ' ' . $user->lastname; ?></h1>

            <h2><?= $user->tagline; ?></h2>
            <?php if($isFriend): ?>
                <button>Dans les contacts</button>
            <?php else: ?>
                <button>Ajouter aux contacts</button>
            <?php endif; ?>

            <div class="bottom-links">
                <a href="" class="viewcontacts"><?= $user->friend_count; ?> contacts</a>
                <a href="" class="viewposts"><?= $user->post_count; ?> publications</a>
                <?php if($user->id == $_SESSION['id']): ?>
                    <a href="" class="sendmessage">Envoyer un message</a>
                <?php else: ?>
                    <a href="" class="sendmessage">Lui envoyer un message</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $layout_content; ?>
<?= $this->element('footer'); ?>