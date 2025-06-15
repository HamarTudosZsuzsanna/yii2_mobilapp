<?php

use app\models\Players;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlayerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->registerCssFile('@web/css/site.css');

$this->title = 'Játékosok';
?>
<div class="players-index container text-center">

    <h1 class="mb-3">Játékos kiválasztása</h1>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
        'options' => ['class' => 'form-inline d-flex justify-content-center gap-2 mb-4 flex-wrap']
    ]); ?>

    <?= Html::dropDownList('player_id', Yii::$app->request->get('player_id'), 
        \yii\helpers\ArrayHelper::map($players, 'id', 'name'), 
        ['class' => 'form-select', 'prompt' => 'Válassz játékost']) ?>

    <?= Html::submitButton('Kiválaszt', ['class' => 'button']) ?>

    <?php ActiveForm::end(); ?>


    <?php if ($selectedPlayer): ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-title bg-dark text-light p-2"><h3><i class="fas fa-user"></i> <?= Html::encode($selectedPlayer->name) ?></h3></div>
                    <div class="card-body text-start">
                        <div class="card-text d-flex flex-row align-items-center justify-content-start gap-5 mb-3">
                            <div><i class="fas fa-birthday-cake"></i></div>
                            <div> <?= Html::encode($selectedPlayer->birthday) ?></div>
                        </div>
                        <div class="card-text d-flex flex-row align-items-center justify-content-start gap-5 mb-3">
                            <div><i class="fas fa-map-marker-alt"></i></div>
                            <div> <?= Html::encode($selectedPlayer->address) ?></div>
                        </div>
                        <div class="card-text d-flex flex-row align-items-center justify-content-start gap-5 mb-3">
                            <div><i class="fas fa-envelope"></i></div>
                            <div> <?= Html::encode($selectedPlayer->email) ?></div>
                        </div>
                        <div class="card-text d-flex flex-row align-items-center justify-content-start gap-5 mb-3">
                            <div><i class="fas fa-id-card"></i></div>
                            <div> <?= Html::encode($selectedPlayer->license) ?></div>
                        </div>
                        <div class="card-text d-flex flex-row align-items-center justify-content-start gap-5 mb-3">
                            <div><i class="fas fa-tshirt"></i></div>
                            <div> <?= Html::encode($selectedPlayer->number) ?></div>
                        </div>
                        
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $selectedPlayer->id], [
                            'class' => 'btn btn-sm btn-outline-danger',
                            'data' => [
                                'confirm' => 'Biztosan törölni szeretnéd?',
                                'method' => 'post',
                            ],
                            'title' => 'Törlés',
                            'encode' => false
                        ]) ?>,
                        <?= Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $selectedPlayer->id], [
                            'class' => 'btn btn-sm btn-outline-primary',
                            'title' => 'Szerkesztés',
                            'encode' => false
                        ]) ?>

                        
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?= Html::a('Vissza az admin felületre', ['admin/'], ['class' => 'btn btn-secondary mb-3 mt-5 w-100']) ?>

</div>


