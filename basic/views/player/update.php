<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Players $model */

$this->title = $model->name;
?>
<div class="players-update w-100">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
