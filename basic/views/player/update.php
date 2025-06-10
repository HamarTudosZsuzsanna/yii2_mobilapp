<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Players $model */

$this->title = 'Játékos frissítése: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Játékosok', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Frissítés';
?>
<div class="players-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
