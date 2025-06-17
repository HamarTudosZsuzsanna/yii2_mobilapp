<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//$this->registerCssFile('@web/css/site.css');

$this->title = 'Edzéslátogatás';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="w-100">

    <?php $form = ActiveForm::begin(); ?>

    <label for="date">Dátum:</label>
    <input type="date" name="date" required class="form-control mb-3">

    <h4 class="text-center">Játékosok</h4>
    <?php foreach ($players as $player): ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="players[]" value="<?= $player->id ?>" id="player<?= $player->id ?>">
            <label class="form-check-label" for="player<?= $player->id ?>">
                <?= Html::encode($player->name) ?>
            </label>
        </div>
    <?php endforeach; ?>

    <div class="mt-3">
        <?= Html::submitButton('Mentés', ['class' => 'button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?= Html::a('Vissza az admin felületre', ['admin/'], ['class' => 'btn btn-secondary mb-3 mt-5 w-100']) ?>