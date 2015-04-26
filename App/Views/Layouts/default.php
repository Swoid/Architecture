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
            <a href="">Accueil</a>
            <a href="">Se déconnecter</a>
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
                <a href="" class="username">Jérémy Smith</a>
            </div>
        </div>
    </div>
</div>
<main id="main">
    <div class="container">
        <?= $layout_content; ?>
        <div class="publish">
            <?= Html::img('avatar-medium.png'); ?>
            <form>
                <div>
                    <input type="text" placeholder="Publier un message ..." >
                    <input type="submit">
                </div>
            </form>
        </div>
        <div id="left">
            <div class="post">
                <div class="header">
                    <?= Html::img('avatar-medium.png'); ?>
                    <span>Jérémy Smith</span>
                    <p class="date">Le 1 mars 2015 à 09:34</p>
                </div>
                <p class="main">
                    Oh sure! Blame the wizards! Perhaps, but perhaps your civilization is merely the sewer of an even greater society above you! I was having the most wonderful dream. Except you were there, and you were there, and you were there! Who are you, my warranty?! She also liked to shut up!
                    Tell them I hate them. And why did 'I' have to take a cab? Robot 1-X, save my friends! And Zoidberg! Now Fry, it's been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? Aww, it's true. I've been hiding it for so long. You know, I was God once.
                </p>
                <div class="footer">
                    <button class="popup-button">6 commentaires</button>
                    <div class="popup">
                        <ul>
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
                        <form>
                            <input type="text">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="header">
                    <?= Html::img('avatar-medium.png'); ?>
                    <span>Adrien Leloup</span>
                    <p class="date">Le 1 mars 2015 à 09:34</p>
                </div>
                <p class="main">
                    Oh sure! Blame the wizards! Perhaps, but perhaps your civilization is merely the sewer of an even greater society above you! I was having the most wonderful dream. Except you were there, and you were there, and you were there! Who are you, my warranty?! She also liked to shut up!
                    Tell them I hate them. And why did 'I' have to take a cab? Robot 1-X, save my friends! And Zoidberg! Now Fry, it's been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? Aww, it's true. I've been hiding it for so long. You know, I was God once.
                </p>
                <div class="footer">
                    <button class="popup-button">6 commentaires</button>
                    <div class="popup">
                        <ul>
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
                        <form>
                            <input type="text">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="right">
            <div class="post">
                <div class="header">
                    <?= Html::img('avatar-medium.png'); ?>
                    <span>Jérémy Smith</span>
                    <p class="date">Le 1 mars 2015 à 09:34</p>
                </div>
                <p class="main">
                    Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood! It's a T. It goes "tuh". Humans dating robots is sick.
                </p>
                <div class="footer">
                    <button class="popup-button">6 commentaires</button>
                    <div class="popup">
                        <ul>
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
                        <form>
                            <input type="text">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="header">
                    <?= Html::img('avatar-medium.png'); ?>
                    <span>Jérémy Smith</span>
                    <p class="date">Le 1 mars 2015 à 09:34</p>
                </div>
                <p class="main">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.
                </p>
                <div class="footer">
                    <button class="popup-button">6 commentaires</button>
                    <div class="popup">
                        <ul>
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
                        <form>
                            <input type="text">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div id="footer">
    <div class="container">
        <div class="nav">
            <a href="">Accueil</a>
            <a href="">Se déconnecter</a>
            <div class="search search-secondary">
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
                <a href=""class="username">Jérémy Smith</a>
            </div>
        </div>
    </div>
</div>
<?= Html::script('popup'); ?>
</body>
</html>