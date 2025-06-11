<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LoginForm $model */

$this->title = 'HeroesAPP';
$this->registerCssFile('@web/css/home.css');
$this->registerCssFile('@web/css/site.css');
$this->registerCssFile('@web/css/anim.css');
$this->registerJsFile('@web/js/main.js');
?>

<div class="site-index">
    <img src="<?= Yii::getAlias('@web') ?>/images/logo.png" alt="logo" id="logo">
    <h1 class="set-time text-center">HeroesAPP</h1>

    <div class="set-time" id="time">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'login-form d-flex flex-column align-items-center justify-content-center gap-4'],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Felhasználónév'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Jelszó'])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Bejelentkezés', ['class' => 'btn btn-primary ']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
