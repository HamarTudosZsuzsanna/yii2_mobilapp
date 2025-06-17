<?php
$this->title = 'HeroesAPP Admin';
?>


<?php

use yii\helpers\Html;




?>

<?= Html::a('Új edzés rögzítése', ['trainings/addplayer'], ['class' => 'btn btn-primary mb-3 button']) ?>
<?= Html::a('Statisztika', ['trainings/list'], ['class' => 'btn btn-primary mb-3 button']) ?>


