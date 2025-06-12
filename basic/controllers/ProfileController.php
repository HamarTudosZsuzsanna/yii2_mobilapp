<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // csak bejelentkezett felhasználóknak
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        return $this->render('index', [
            'user' => $user,
        ]);
    }

    public function actionPersonal()
    {
        $user = Yii::$app->user->identity;
        return $this->render('personal/index', ['user' => $user]);
    }
}
