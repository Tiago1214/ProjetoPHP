<?php

namespace frontend\controllers;

use common\models\CategoriaSearch;
use common\models\Profile;
use common\models\Reserva;
use common\models\User;
use common\models\ReservaSearch;
use yii\filters\AccessControl;
use yii\jui\Dialog;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use MQTT\Client;

/**
 * ReservaController implements the CRUD actions for Reserva model.
 */
class ReservaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        /**
                         *Nas reservas os clientes só podem visualizar,editar, criar ou cancelar reservas
                         */
                        [
                            'actions' => ['login','error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['logout', 'index','create','update','view','cancelar'], // add all actions to take guest to login page
                            'allow' => true,
                            'roles' => ['cliente','funcionario','admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Reserva models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReservaSearch();
        $userprofile=Profile::find()->all();
        $profile_id=0;
        foreach($userprofile as $user){
            if($user->user_id==Yii::$app->user->id){
                $profile_id=$user->id;
            }
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Reserva::find()->where(['profile_id' => $profile_id,'estado'=>[0, 1]])
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     *Método para cancelar a reserva
     */
    public function actionCancelar($id){
        $reserva=$this->findModel($id);
        if($reserva->estado==0){
            $reserva->estado=2;
            $reserva->save();
            //mqtt
            $mqtt = new \PhpMqtt\Client\MqttClient('127.0.0.1', '1883', 'frontend');
            $mqtt->connect();
            $mqtt->publish('Reservas', 'Reserva cancelada', 1);
            $mqtt->disconnect();
        }
        return $this->redirect('../reserva/index');
    }

    /**
     * Displays a single Reserva model.
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
     * Creates a new Reserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Reserva();
        $userprofile=Profile::find()->all();
        $profile_id=0;
        foreach($userprofile as $user){
            if($user->user_id==Yii::$app->user->id){
                $profile_id=$user->id;
            }
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->estado=0;
                $model->profile_id=$profile_id;
                $model->save();
                //mqtt
                $mqtt = new \PhpMqtt\Client\MqttClient('127.0.0.1', '1883', 'frontend');
                $mqtt->connect();
                $mqtt->publish('Reservas', 'Reserva Criada', 1);
                $mqtt->disconnect();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reserva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            //mqtt
            $mqtt = new \PhpMqtt\Client\MqttClient('127.0.0.1', '1883', 'frontend');
            $mqtt->connect();
            $mqtt->publish('Reservas', 'Reserva atualizada', 1);
            $mqtt->disconnect();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reserva model.
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
     * Finds the Reserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Reserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserva::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
