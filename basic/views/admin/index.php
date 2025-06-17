<?php
$this->title = 'HeroesAPP Admin';
?>


<?php

use yii\helpers\Html;

$this->registerCssFile('@web/css/profile.css');

$this->title = 'Saját profil';
?>

<h1 class="name"><?= Yii::$app->user->identity->username ?></h1>


<div class=" d-flex flex-column align-items-center justify-content-center mb-5 mt-3">
    <div class="club fst-italic"><?= Html::encode(Yii::$app->user->identity->username) ?></div>
    <hr>
    <div class="club">Heroes Flying Disc</div>
</div>

<?= Html::a('Üzenetküldés', ['text/create'], ['class' => 'btn btn-primary mb-3 button']) ?>
<?= Html::a('Játékosok', ['player/'], ['class' => 'btn btn-primary mb-3 button']) ?>
<?= Html::a('Edzéslátogatás', ['trainings/index'], ['class' => 'btn btn-primary mb-3 button']) ?>
<?= Html::a('Tagdíj', ['profile/personal'], ['class' => 'btn btn-primary mb-3 button']) ?>
<hr>
<?= Html::a('Üzenőfal', ['text/'], ['class' => 'btn btn-primary mb-3 button']) ?>


