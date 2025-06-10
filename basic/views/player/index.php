<?php

use app\models\Players;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlayerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Játékosok';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="players-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Új játékos hozzáadása', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'birthday',
            'address',
            'email:email',
            'license',
            'number',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Players $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
