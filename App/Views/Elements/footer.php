<?php use Core\Helpers\Html; ?>
<div id="footer">
    <div class="container">
        <div class="nav">
            <a href="<?= Html::href('posts/index'); ?>">Accueil</a>
            <a href="<?= Html::href('users/logout'); ?>">Se déconnecter</a>

            <div class="search search-secondary">
                <button class="popup-button">Search</button>
                <div class="popup top">
                    <form>
                        <div>
                            <input type="text" placeholder="Rechercher...">
                            <input type="submit" value="Go">
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <a href="<?= Html::href('users/index/' . $_SESSION['id']); ?>"
                   class="username"><?= $_SESSION['username']; ?></a>
            </div>
        </div>
    </div>
</div>
<?= Html::script('form'); ?>
<?= Html::script('popup'); ?>
<?= Html::script('jquery'); ?>
<?= Html::script('ajax'); ?>
</body>
</html>