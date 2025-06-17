<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Players;
use app\models\Trainings;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

class TrainingsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $user = Yii::$app->user->identity;
                            if ($user && $user->isRoleAdmin()) {
                                return true;
                            }
                            // Ha be van jelentkezve, de nem admin
                            Yii::$app->response->redirect(['site/login'])->send();
                            return false;
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionList()
    {
        $trainings = \app\models\Trainings::find()->orderBy(['date' => SORT_DESC])->all();
        $allPlayers = \yii\helpers\ArrayHelper::map(\app\models\Players::find()->all(), 'id', 'name');

        return $this->render('list', [
            'trainings' => $trainings,
            'allPlayers' => $allPlayers,
        ]);
    }

    public function actionAddplayer()
    {
        $players = Players::find()->orderBy('name')->all();

        if (Yii::$app->request->isPost) {
            $date = Yii::$app->request->post('date');
            $playerIds = Yii::$app->request->post('players', []);

            $training = new Trainings();
            $training->date = $date;
            $training->players = json_encode($playerIds);
            $training->save();

            Yii::$app->session->setFlash('success', 'Jelenlét elmentve.');
            return $this->refresh();
        }

        return $this->render('addplayer', [
            'players' => $players
        ]);
    }
}
