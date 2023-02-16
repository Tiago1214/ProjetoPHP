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
use Dompdf\Dompdf;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
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
                    'class' => AccessControl::class,
                    'rules' => [
                        /**
                         *Nos pedidos os clientes podem criar,atualizar e visualizar as suas reservas e ver a fatura dos
                         * pedidos concluídos
                         */
                        [
                            'actions' => ['login','error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['logout', 'index','create','update','view','finalizarpedido','fatura','cancelar'], // add all actions to take guest to login page
                            'allow' => true,
                            'roles' => ['cliente','funcionario','admin'],
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
        //Selecionar todos os registos da tabela profile
        $userprofile=Profile::find()->all();
        $profile_id=0;
        //Correr os registos da tabela profile
        foreach($userprofile as $user){
            if($user->user_id==Yii::$app->user->id){
                $profile_id=$user->id;
            }
        }
        //Mostrar apenas os registos quando o profile_id for igual ao utilizador com sessão iniciada
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

    /**
     * Mudar o estado do pedido para cancelado
     */
    public function actionCancelar($idp){
        if($idp==null){
            return null;
        }
        //selecionar o registo para editar o estado
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
        //Correr os registos da tabela profile
        $userprofile=Profile::find()->all();
        $profile_id=0;
        //Encontrar o utilizador com sessão iniciada
        foreach($userprofile as $user){
            if($user->user_id==Yii::$app->user->id){
                $profile_id=$user->id;
            }
        }

        //Atribuir valores
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


    /**
     * Função para finalizar pedido
     * Atribuir o total e o método de pagamento ao registo
     */
    public function actionFinalizarpedido($idp){
        //Encontrar o registo selecionado
        $model=$this->findModel($idp);
        //Selecionar as linhas de pedido que pertencem ao pedido selecionado
        $linhaspedido=Linhapedido::find()->where(['pedido_id'=>$idp])->all();
        //Selecionar todos os métodos de pagamento ativos
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


    /**
     *Gerar Fatura baseada no registo que foi selecionado
     */
    public function actionFatura($idp){
        //registo selecionado
        $pedido = $this->findModel($idp);
        $empresa=Empresa::findOne(['id'=>1]);
        $linhapedido=Linhapedido::find()->where(['pedido_id'=>$idp])->all();
        $html=  $this->renderPartial('_faturapdf',['pedido'=>$pedido,'linhapedido'=>$linhapedido,'empresa'=>$empresa]);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        //gerar pdf
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        ob_end_clean();
        // Output the generated PDF to Browser
        $dompdf->stream('fatura nr:'.$pedido->id ,array('Attachment'=>false));


    }
}
