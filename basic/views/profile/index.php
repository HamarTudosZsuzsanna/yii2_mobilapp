<?php
use yii\helpers\Html;

$this->title = 'Saját profil';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><strong>Felhasználónév:</strong> <?= Html::encode($user->username) ?></p>
<p><strong>Email:</strong> <?= Html::encode($user->email) ?></p>
<p><strong>Szerepkör:</strong> <?= Html::encode($user->role) ?></p>

<?php if ($user->player): ?>
    <h2>Játékos adatok</h2>
    <p><strong>Név:</strong> <?= Html::encode($user->player->name) ?></p>
    <p><strong>Mezszám:</strong> <?= Html::encode($user->player->number) ?></p>
<?php endif; ?>
