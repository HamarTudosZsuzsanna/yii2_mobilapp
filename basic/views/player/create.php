<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Players $model */

$this->title = 'Új játékos hozzáadása';
$this->params['breadcrumbs'][] = ['label' => 'Játékosok', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="players-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
