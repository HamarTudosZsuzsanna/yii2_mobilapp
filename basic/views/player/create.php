<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Players $model */

$this->title = 'Új játékos hozzáadása';

$this->registerCssFile('@web/css/site.css');

?>
<div class="players-create w-100">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
