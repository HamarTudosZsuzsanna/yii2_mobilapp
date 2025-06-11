<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\Controller;
use app\models\Texts;

class TextController extends Controller
{
    public function actionIndex()
    {
        $texts = Texts::find()->orderBy(['created_at' => SORT_DESC])->all();

        return $this->render('index', [
            'texts' => $texts,
        ]);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->isRoleAdmin();
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $model = new Texts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
