<?php use Core\Helpers\Html; ?>
<div class="container">
    <div class="login">
        <h1>Inscrivez-<em>vous</em></h1>
        <img src="<?= ASSETS; ?>img/logo.svg" alt="" width="150px"/>
        <form action="<?= ROOT; ?>users/register" class="form" method="post">
            <div>
                <label for="login">Login</label>
                <input type="text" id="login" name="username" placeholder="Entrez votre login ...">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe ...">
                <input class="submit-button" type="submit" value="S'inscrire">
            </div>
        </form>
        <a href="#">Vous avez déjà un compte ?</a>
    </div>
</div>