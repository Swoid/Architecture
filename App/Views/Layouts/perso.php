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
                    <button class="popup-button"></button>
                    <ul class="popup">

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
            <?php if($user->id == $_SESSION['id']): ?>
                <button>Modifier le profil</button>
            <?php elseif($isFriend): ?>
                <button>Dans les contacts</button>
            <?php else: ?>
                <button>Ajouter aux contacts</button>
            <?php endif; ?>

            <div class="bottom-links">
                <a href="<?= Html::href('users/friends/' . $user->id); ?>" class="viewcontacts"><?= $user->friend_count; ?> contacts</a>
                <a href="" class="viewposts"><?= $user->post_count; ?> publications</a>
                <?php if($user->id == $_SESSION['id']): ?>
                    <a href="" class="sendmessage">Envoyer un message</a>
                <?php else: ?>
                    <a href="<?= Html::href('messages/conversation/' . $user->id); ?>" class="sendmessage">Lui envoyer un message</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Session->flash(); ?>
<?= $layout_content; ?>
<?= $this->element('footer'); ?>