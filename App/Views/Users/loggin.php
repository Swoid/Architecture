<?php use Core\Helpers\Html, Core\Cookies; ?>
<div class="container">
    <div class="login">
        <h1>Connectez-<em>vous</em></h1>
        <?php if(Cookies::get('username')): ?>
            <?= Html::img('avatar-large.png'); ?>
            <h2><?= Cookies::get('username'); ?></h2>
            <a href="<?= Html::href('users/clear'); ?>">Ce n'est pas vous ?</a>
        <?php else: ?>
            <img src="<?= ASSETS; ?>img/logo.svg" alt="" width="100px"/>
            <h2>Qui êtes-vous ?</h2>
        <?php endif; ?>
        <form action="<?= ROOT; ?>users/loggin" class="form" method="post">
            <div>
                <?php if(!Cookies::get('username')): ?>
                    <label for="username">Login</label>
                    <input type="text" name="username" id="username" placeholder="Entrez votre login ..."/>
                <?php else: ?>
                    <input type="hidden" name="username" value="<?= Cookies::get('username'); ?>"/>
                <?php endif; ?>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe ...">
                <label for="remember">Se souvenir de moi</label>
                <input type="checkbox" name="remember" id="remember"/>
                <input class="submit-button" type="submit" value="Se connecter">
            </div>
        </form>
        <a href="<?= Html::href('users/register'); ?>">Pas encore inscrit ?</a>
    </div>
</div>