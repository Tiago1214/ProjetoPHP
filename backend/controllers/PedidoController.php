<?php

namespace backend\controllers;

use backend\models\Mesa;
use backend\models\MetodoPagamento;
use common\models\Pedido;
use common\models\PedidoSearch;
use common\models\Profile;
use common\models\User;
use yii\filters\AccessControl;


use yii\rbac\Role;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
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
                    /**
                     * Nos pedidos os funcionários e os admins podem fazer o mesmo
                     */
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login','error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['logout', 'index','create','view','update','estado','delete'], // add all actions to take guest to login page
                            'allow' => true,
                            'roles' => ['admin','funcionario'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pedido models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
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
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pedido();

        //$roleModel = Yii::$app->db ->createCommand("Select * from auth_assignment where item_name='cliente'")->queryAll();

        $profile=Profile::find()->all();
        $mesa=Mesa::find()->all();

        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
                $model->total=0.0;

                $model->data=Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');

                $model->mesa_id=null;
                $model->metodo_pagamento_id=null;
                $model->estado=1;

                $model->save(false);

                return $this->redirect(['linhapedido/create', 'idp' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'profile'=>$profile,
            'mesa'=>$mesa
        ]);
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $metodo_pagamento_id ID
     * @param int $mesa_id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $metodo_pagamento=MetodoPagamento::find()->where(['estado'=>1]);
        $mesa=Mesa::find()->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'metodo_pagamento' => $metodo_pagamento,
            'mesa' => $mesa,
        ]);
    }

    /**
     * Deletes an existing Pedido model.
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
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
