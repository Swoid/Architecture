<?php use Core\Helpers\Html; ?>
<div class="container">
    <div class="login">
        <h1>Connectez-<em>vous</em></h1>
        <?= Html::img('avatar-large.png'); ?>
        <h2>Adrien Leloup</h2>
        <a href="#">Ce n'est pas vous ?</a>
        <form action="<?= ROOT; ?>users/login" class="form" method="post">
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="Entrez votre mot de passe ...">
                <input type="hidden" name="username" value="test">
                <input class="submit-button" type="submit" value="Se connecter">
            </div>
        </form>
        <a href="#">Pas encore inscrit ?</a>
    </div>
</div>