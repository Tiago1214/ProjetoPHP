<?php

namespace frontend\controllers;

use common\models\Artigo;
use common\models\LinhaPedido;
use common\models\LinhaPedidoSearch;
use common\models\Pedido;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhapedidoController implements the CRUD actions for LinhaPedido model.
 */
class LinhapedidoController extends Controller
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
                            'actions' => ['logout','create','editquant'], // add all actions to take guest to login page
                            'allow' => true,
                            'roles' => ['cliente','funcionario','admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all LinhaPedido models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LinhaPedidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LinhaPedido model.
     * @param int $id ID
     * @param int $pedido_id Pedido ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $pedido_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $pedido_id),
        ]);
    }

    /**
     * Creates a new LinhaPedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * Criar Linha de Pedido
     */
    public function actionCreate($idp)
    {
        //Criar novo registo
        $model = new LinhaPedido();
        //Selecionar o registo do pedido quando o id é igual ao id de pedido que veio no url
        $pedido=Pedido::find()->where(['id'=>$idp])->all();
        //Selecionar o registo das linhas de pedido quando o pedido_id é igual ao pedido selecionado
        $linhaspedido=LinhaPedido::find()->where(['pedido_id'=>$idp])->all();
        //Selecionar os artigos que tem o estado Ativo
        $artigo=Artigo::find()->where(['estado'=>[1]])->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                /**caso o utilizador tente criar uma linha de pedido com um artigo já existente na fatura,
                 * em vez de criar um registo novo faz se um update no foreach
                **/
                foreach($linhaspedido as $quant){
                    if($quant->artigo_id==$model->artigo_id){
                        $quant->quantidade=$quant->quantidade+$model->quantidade;
                        $quant->save(false);
                        return $this->redirect(['create', 'idp' => $idp]);
                    }
                }
                //Selecionar o artigo que foi inserido no formulário de registo
                $findartigo=Artigo::find()->where(['id'=>$model->artigo_id])->all();
                foreach($findartigo as $art){
                    //Atribuir valores
                    $model->valorunitario=$art->preco;
                    $model->valoriva =$art->preco*($art->iva->taxaiva/100);
                    $model->taxaiva=$art->iva->taxaiva;
                }
                //atribuir o pedido á linha de pedido
                $model->pedido_id=$idp;

                $model->save(false);
                return $this->redirect(['create', 'idp' => $idp]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'pedido'=>$pedido,
            'linhaspedido'=>$linhaspedido,
            'artigo'=>$artigo,
        ]);
    }

    /**
     *Editar a quantidade de uma linha de pedido
     */
    public function actionEditquant($id){
        $model=$this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['create', 'idp' => $model->pedido_id]);
        }

        return $this->render('editquant', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LinhaPedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $pedido_id Pedido ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $pedido_id)
    {
        $model = $this->findModel($id, $pedido_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'pedido_id' => $model->pedido_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LinhaPedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $pedido_id Pedido ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$idp)
    {
        $linha=$this->findModel($id)->delete();

        return $this->redirect(['create','idp'=>$idp]);
    }

    /**
     * Finds the LinhaPedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $pedido_id Pedido ID
     * @return LinhaPedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LinhaPedido::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
