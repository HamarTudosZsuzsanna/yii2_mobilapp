<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Players $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerCssFile('@web/css/site.css');
$this->registerCssFile('@web/css/profile.css');
?>

<div class="players-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control data']) ?>

    <?= $form->field($model, 'birthday')->label('Születési dátum (pl. 2005.05.12)') -> textInput(['maxlength' => true, 'class' => 'form-control data']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'class' => 'form-control data']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control data']) ?>

    <?= $form->field($model, 'license')->textInput(['maxlength' => true, 'class' => 'form-control data']) ?>

    <?= $form->field($model, 'number')->textInput(['class' => 'form-control data']) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Mentés', ['class' => 'button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= Html::a('Vissza a játékoslistához', ['player/'], ['class' => 'btn btn-secondary mb-3 mt-5 w-100']) ?>

</div>
