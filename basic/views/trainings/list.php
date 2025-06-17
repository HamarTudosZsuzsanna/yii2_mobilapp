<?php

use yii\helpers\Html;

$this->title = 'Edzések listája';
?>

<h1><?= Html::encode($this->title) ?></h1>



<div class="accordion mb-3 w-100" id="accordionExample">
    <?php foreach ($trainings as $index => $training): ?>
        <?php $playerIds = json_decode($training->players, true); ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?= $index ?>">
                <button class="accordion-button <?= $index !== 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $index ?>">
                    <?= Html::encode($training->date) ?> – <?= count($playerIds) ?> fő
                </button>
            </h2>
            <div id="collapse<?= $index ?>" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul>
                        <?php if (!empty($playerIds)): ?>
                            <?php foreach ($playerIds as $id): ?>
                                <li><?= Html::encode($allPlayers[$id] ?? 'Ismeretlen') ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>Nincs jelenlét rögzítve</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?= Html::a('Új edzés rögzítése', ['trainings/addplayer'], ['class' => 'btn btn-success button mb-3']) ?>
<?= Html::a('Vissza az admin felületre', ['admin/index'], ['class' => 'btn btn-secondary w-100 mb-3']) ?>