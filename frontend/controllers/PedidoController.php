<?php

namespace frontend\controllers;

use backend\models\Empresa;
use backend\models\Mesa;
use backend\models\Metodopagamento;
use common\models\Linhapedido;
use common\models\Pedido;
use common\models\PedidoSearch;
use common\models\Profile;
use common\models\Reserva;
use yii\data\ActiveDataProvider;
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
        $userprofile=Profile::find()->all();
        $profile_id=0;
        foreach($userprofile as $user){
            if($user->user_id==Yii::$app->user->id){
                $profile_id=$user->id;
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Pedido::find()->where(['profile_id' => $profile_id])->orderBy(['data'=>'desc'])

        ]);

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
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pedido();
        $userprofile=Profile::find()->all();
        $profile_id=0;
        foreach($userprofile as $user){
            if($user->user_id==Yii::$app->user->id){
                $profile_id=$user->id;
            }
        }

        $model->total=0.0;
        $model->tipo_pedido=1;
        $model->profile_id=$profile_id;
        $model->data=Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
        $model->mesa_id=null;
        $model->metodo_pagamento_id=null;
        $model->estado='Em Processamento';
        $model->save(false);

        return $this->redirect(['linhapedido/create', 'idp' => $model->id]);


    }

    public function actionFinalizarpedido($idp){
        $model=$this->findModel($idp);
        $linhaspedido=Linhapedido::find()->where(['pedido_id'=>$idp])->all();
        $metodospagamento=MetodoPagamento::find()->where(['estado'=>1])->all();
        $model->estado='Concluído';
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

    public function actionFatura($idp){

        $pedido = $this->findModel($idp);
        $empresa=Empresa::findOne(['id'=>1]);
        $linhapedido=Linhapedido::find()->where(['pedido_id'=>$idp])->all();
        $html = $this->renderPartial('_faturapdf',['pedido'=>$pedido,'linhapedido'=>$linhapedido,'empresa'=>$empresa]);

        $pdf=Yii::$app->pdf;
        $pdf->content=$html;
        return $pdf->render();

    }
}
