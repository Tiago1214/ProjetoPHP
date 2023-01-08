<?php

namespace backend\controllers;

use backend\models\Mesa;
use backend\models\MetodoPagamento;
use common\models\Linhapedido;
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
                            'actions' => ['logout', 'index','create','view',
                                'update','estado','delete',
                                'selectmesa','finalizarpedido','cancelar'], // add all actions to take guest to login page
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
        $linhapedido=Linhapedido::find()->where(['pedido_id'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'linhapedido'=>$linhapedido,
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
                $model->estado='Em Processamento';

                $model->save(false);
                if($model->tipo_pedido==0){
                    return $this->redirect(['pedido/selectmesa', 'idp' => $model->id]);
                }
                else{
                    return $this->redirect(['linhapedido/create', 'idp' => $model->id]);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'profile'=>$profile,
            'mesa'=>$mesa,
        ]);
    }


    /**
     * Atribui mesa ao pedido seleiconado
     * Se o registo for atualizado com sucesso o pedido fica com uma mesa associada
     */
    public function actionSelectmesa($idp){
        $model=$this->findModel($idp);

        $mesa=Mesa::find()->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false)) {
            return $this->redirect(['linhapedido/create', 'idp' => $model->id]);
        }

        return $this->render('formmesa', [
            'model' => $model,
            'mesa' => $mesa,
        ]);
    }

    /**
     * Finalizar pedido, atribuir método de pagamento e total
     */
    public function actionFinalizarpedido($idp){
        $model=$this->findModel($idp);
        $linhaspedido=Linhapedido::find()->where(['pedido_id'=>$idp])->all();
        $metodospagamento=MetodoPagamento::find()->where(['estado'=>1])->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false)) {
            return $this->redirect(['pedido/index']);
        }

        return $this->render('finalizarpedido', [
            'model' => $model,
            'linhaspedido'=>$linhaspedido,
            'metodospagamento'=>$metodospagamento,
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

    public function actionCancelar($idp){
        if($idp==null){
            return null;
        }
        $model=$this->findModel($idp);
        $model->estado='Cancelado';
        $model->save();
        return $this->redirect(['index']);
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
