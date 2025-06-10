<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class AdminController extends Controller
{
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isRoleAdmin()) {
            throw new ForbiddenHttpException('Ehhez az oldalhoz nincs jogosultságod.');
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
