<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Új üzenet küldése';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="text-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'icon')->dropDownList([
        'fontos' => '🔴 Fontos',
        'info' => 'ℹ️ Információ',
        'kerdes' => '❓ Kérdés',
        'penz' => '💰 Pénz',
        'szuletesnap' => '🎂 Születésnap',
    ], ['prompt' => 'Válassz ikont']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton('Mentés', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
