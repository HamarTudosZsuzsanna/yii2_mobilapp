<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use Yii;

$user = Yii::$app->user->identity;
if ($user && $user->isRoleAdmin()) {
    $this->title = 'HeroesAPP Admin';
} else {
    $this->title = 'HeroesAPP';
}

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

<header id="header" class="bg-dark p-2 text-end">
    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="d-inline-block text-white">
            <span class="me-3">
                <?php

                $user = Yii::$app->user->identity;
                $isAdmin = $user->role === 'admin';

                $profileUrl = $isAdmin ? Url::to(['/admin/index']) : Url::to(['/profile/index']);

                echo Html::a(
                    '<i class="fas fa-user-circle"></i> ' . Html::encode($user->username),
                    $profileUrl,
                    [
                        'class' => 'text-white text-decoration-none',
                        'encode' => false,
                        'title' => $isAdmin ? 'Admin felület' : 'Profil megtekintése',
                    ]
                );
                ?>
            </span>

            <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-inline']) ?>
            <?= Html::submitButton('<i class="fas fa-sign-out-alt"></i>', [
                'class' => 'btn btn-link text-white',
                'title' => 'Kijelentkezés',
                'encode' => false,
            ]) ?>
            <?= Html::endForm() ?>
        </div>
    <?php endif; ?>
</header>



    <main id="main" class="flex-grow-1" role="main">
        <div class="container d-flex flex-column align-items-center justify-content-start mt-3 mb-3" id="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="py-3 bg-dark text-light fixed-bottom">
        <div class="container">
            <div class="row text-light">
                <div class="col-md-6 text-center text-md-start">&copy; HeroesAPP <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>