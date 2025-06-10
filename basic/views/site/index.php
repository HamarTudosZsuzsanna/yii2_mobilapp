<?php

/** @var yii\web\View $this */

$this->title = 'HeroesAPP';
$this->registerCssFile('@web/css/home.css');
$this->registerCssFile('@web/css/anim.css');
$this->registerJsFile('@web/js/main.js');

?>
<div class="site-index">

    <img src="<?= Yii::getAlias('@web') ?>/images/logo.png" alt="logo" id="logo">
    <h1 class="set-time text-center">HeroesAPP</h1>
    <div class="set-time" id="time">
        <form action="" method="POST" class="login-form d-flex flex-column align-items-center justify-content-center gap-4">
            <input type="text" name="username" id="username" placeholder="Felhasználónév">
            <input type="password" name="password" id="password" placeholder="Jelszó">
            <button type="submit" class="btn">Bejelentkezés</button>
        </form>
    </div>
</div>