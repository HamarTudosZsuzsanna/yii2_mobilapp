<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Players;
use app\models\Trainings;

class TrainingsController extends Controller
{
    public function actionIndex()
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

        return $this->render('admin', [
            'players' => $players
        ]);
    }
}
