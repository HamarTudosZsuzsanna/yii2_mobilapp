<?php

use yii\helpers\Html;

$this->registerCssFile('@web/css/profile.css');

$this->title = 'Saját profil';
?>

<h1 class="name"><?= Html::encode($user->player->name) ?></h1>


<div class=" d-flex flex-column align-items-center justify-content-center mb-5 mt-3">
    <div class="club fst-italic"><?= Html::encode($user->username) ?></div>
    <hr>
    <div class="club">Heroes Flying Disc</div>
</div>

<?= Html::a('Személyes adatok', ['profile/personal'], ['class' => 'btn btn-primary mb-3 button']) ?>
<?= Html::a('Edzéslátogatás', ['profile/personal'], ['class' => 'btn btn-primary mb-3 button']) ?>
<?= Html::a('Tagdíj', ['profile/personal'], ['class' => 'btn btn-primary mb-3 button']) ?>
<?= Html::a('Üzenőfal', ['text/'], ['class' => 'btn btn-primary mb-3 button']) ?>


