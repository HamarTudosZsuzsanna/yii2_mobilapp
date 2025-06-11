<?php

use yii\helpers\Html;

$this->title = 'Üzenőfal';
$this->registerCssFile('@web/css/text.css');
$this->registerJsFile('@web/js/text.js');
?>

<?php foreach ($texts as $text): ?>
    <div class="message-container d-flex flex-row justify-content-start align-items-center gap-3 w-100 no-wrap m-3">

        <img src="<?= Yii::getAlias('@web') ?>/images/<?= Html::encode($text->icon) ?>.png" class="icons" alt="<?= Html::encode($text->icon) ?>"></img>
        <div class="message">
            <?= Html::encode($text->text) ?>
        </div>
        <hr>

    </div>
    <span class="date"><?= date('Y.m.d H:i', strtotime($text->created_at)) ?></span>
<?php endforeach; ?>