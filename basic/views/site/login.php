<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Bejelentkezés';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username')->textInput(['placeholder' => 'Felhasználónév'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Jelszó'])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Belépés', ['class' => 'button']) ?>
</div>

<?php ActiveForm::end(); ?>
