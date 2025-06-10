<?php

namespace app\controllers;

use Yii;
use app\models\Players;
use app\models\Users;
use app\models\PlayerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\filters\AccessControl;

/**
 * PlayerController implements the CRUD actions for Players model.
 */
class PlayerController extends Controller
{
    /**
     * @inheritDoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'update', 'delete'], // vagy ['*']
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // csak bejelentkezett
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->isRoleAdmin();
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Players models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlayerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Players model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Players model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Players();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            // Felhasználónév generálás: heroes#mezszám
            $username = 'heroes#' . $model->number;

            // Jelszó generálás: heroesYYYYMMDD
            $rawPassword = 'heroes' . str_replace(['-', '.', '/'], '', $model->birthday);

            // Új Users rekord
            $user = new Users();
            $user->username = $username;
            $user->email = $model->email;
            $user->role = Users::ROLE_PLAYER;
            $user->player_id = $model->id;
            $user->password = Yii::$app->security->generatePasswordHash($rawPassword);
            $user->created_at = date('Y-m-d H:i:s');

            if (!$user->save()) {
                Yii::$app->session->setFlash('error', 'A játékos létrejött, de a felhasználó mentése sikertelen.');
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Players model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Players model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Players model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Players the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Players::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
