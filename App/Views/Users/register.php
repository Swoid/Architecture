<?php use Core\Helpers\Html; ?>
<div class="container">
    <div class="login">
        <h1>Inscrivez-<em>vous</em></h1>
        <img src="<?= ASSETS; ?>img/logo.svg" alt="" width="100px"/>
        <form action="<?= ROOT; ?>users/register" class="form" method="post">
            <div>
                <label for="login">Nom d'utilisateur</label>
                <input type="text" id="login" name="username" placeholder="Entrez votre nom d'utilisateur ...">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom ...">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" placeholder="Entrez votre nom ...">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe ...">
                <input class="submit-button" type="submit" value="S'inscire">
            </div>
        </form>
        <a href="<?= Html::href('users/connect'); ?>">Vous êtes déjà inscrit ?</a>
    </div>
</div>