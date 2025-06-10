<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Players $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Játékosok', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="players-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Frissítés', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Törlés', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Biztos törölni szeretnéd ezt a játékost?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'birthday',
            'address',
            'email:email',
            'license',
            'number',
            /*'created_at',*/
        ],
    ]) ?>

</div>
