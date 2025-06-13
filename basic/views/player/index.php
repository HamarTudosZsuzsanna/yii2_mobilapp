<?php

use app\models\Players;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlayerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerCssFile('@web/css/site.css');


$this->title = 'Játékosok';
?>
<div class="players-index container my-4">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="text-center mb-3">
        <?= Html::a('Új játékos hozzáadása', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-striped table-bordered'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'name',
                //'birthday',
                //'address',
                //'email:email',
                //'license',
                'number',
                //'created_at',
                [
                    'class' => yii\grid\ActionColumn::className(),
                    'urlCreator' => function ($action, \app\models\Players $model, $key, $index, $column) {
                        return \yii\helpers\Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

</div>
<div class="text-center mt-4">
    <?= Html::a('Vissza az admin felületre', ['admin/index'], ['class' => 'button']) ?>
</div>