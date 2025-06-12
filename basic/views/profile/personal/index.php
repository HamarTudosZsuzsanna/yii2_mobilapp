<?php

use yii\helpers\Html;
$this->registerCssFile('@web/css/profile.css');


$this->title = 'Saját profil';
?>

<?php if ($user->player): ?>
<div class="details-container">
    <div class="label">név</div>
    <div class="data"><?= Html::encode($user->player->name) ?></div>
</div>
<div class="details-container">
    <div class="label">születési dátum, idő</div>
    <div class="data"><?= Html::encode($user->player->birthday) ?></div>
</div>
<div class="details-container">
    <div class="label">lakcím</div>
    <div class="data"><?= Html::encode($user->player->address) ?></div>
</div>
<div class="details-container">
    <div class="label">email cím</div>
    <div class="data"><?= Html::encode($user->player->email) ?></div>
</div>
<hr>
<div class="details-container">
    <div class="label">versenyeng. szám</div>
    <div class="data"><?= Html::encode($user->player->license) ?></div>
</div>
<div class="details-container">
    <div class="label">mezszám</div>
    <div class="data"><?= Html::encode($user->player->number) ?></div>
</div>
<?php endif; ?>
<?= Html::a('Vissza', ['profile/'], ['class' => 'btn btn-primary mb-3 mt-5 button']) ?>