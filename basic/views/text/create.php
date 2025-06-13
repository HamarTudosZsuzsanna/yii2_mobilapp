<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('@web/css/site.css');
$this->registerCssFile('@web/css/profile.css');

$this->title = 'Új üzenet a csapatnak';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="text-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'icon')->label(false)->dropDownList([
        'fontos' => '🔴 Fontos',
        'info' => 'ℹ️ Információ',
        'kerdes' => '❓ Kérdés',
        'penz' => '💰 Pénz',
        'szuletesnap' => '🎂 Születésnap',
    ], ['prompt' => 'Válassz kategóriát']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 15, 'class' => 'form-control data'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Küldés', ['class' => 'button']) ?>
    </div>
    <?= Html::a('Vissza', ['admin/'], ['class' => 'btn btn-primary mb-3 mt-5 button']) ?>

    <?php ActiveForm::end(); ?>
</div>
