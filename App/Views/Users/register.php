<?php use Core\Helpers\Html; ?>
<div class="container">
    <div class="login">
        <h1>Inscrivez-<em>vous</em></h1>
        <img src="<?= ASSETS; ?>img/logo.svg" alt="" width="100px"/>
        <form action="<?= ROOT; ?>users/register" class="form" method="post">
            <div>
                <label for="login">Login</label>
                <input type="text" id="login" name="username" placeholder="Enter your login ...">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom ...">
                <label for="firstname">Nom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Entrez votre nom ...">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe ...">
                <input class="submit-button" type="submit" value="S'inscire">
            </div>
        </form>
        <a href="<?= Html::href('users/loggin'); ?>">Vous avez déjà un compte ?</a>
    </div>
</div>