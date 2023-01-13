<?php

namespace backend\controllers;

use common\models\Artigo;
use common\models\LinhaPedido;
use common\models\LinhaPedidoSearch;
use common\models\Pedido;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use MQTT\Client;

/**
 * LinhaPedidoController implements the CRUD actions for LinhaPedido model.
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
                         *Neste controlador os funcionários só podem visualizar os registos de ivas.
                         * Nos ivas os admins podem realizar todas as ações necessárias para o funcionamento dos mesmos
                         */
                        [
                            'actions' => ['login','error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['logout', 'index','view','create','editquant','delete'], // add all actions to take guest to login page
                            'allow' => true,
                            'roles' => ['admin','funcionario'],
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LinhaPedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idp)
    {
        //Criar nova linha de pedido
        $model = new LinhaPedido();
        //encontrar o pedido selecionado
        $pedido=Pedido::find()->where(['id'=>$idp])->all();
        //correr as linhas de pedido correspondente ao pedido selecionado
        $linhaspedido=LinhaPedido::find()->where(['pedido_id'=>$idp])->all();
        //selecionar os artigos que estão ativos
        $artigo=Artigo::find()->where(['estado'=>[1]])->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                //verificar se já existe uma linha de pedido igual, caso exista não se cria uma nova mas sim
                //adiciona-se a quantidade desejada e muda-se o valor de iva
                foreach($linhaspedido as $quant){
                    //verificar se a linha de pedido já existe
                    if($quant->artigo_id==$model->artigo_id){
                        //adicionar mais quantidade há linha de pedido já existente
                        $quant->quantidade=$quant->quantidade+$model->quantidade;
                        $quant->valoriva=($quant->valorunitario*$quant->quantidade)*($quant->artigo->iva->taxaiva/100);
                        //salvar a quantidade
                        $quant->save(false);
                        return $this->redirect(['create', 'idp' => $idp]);
                    }
                }
                //selecionar os dados do artigo selecionado
                $findartigo=Artigo::find()->where(['id'=>$model->artigo_id])->all();
                //correr os dados do artigo selecionado e atribuir valores á linha de pedido
                foreach($findartigo as $art){
                    $model->valorunitario=$art->preco;
                    $model->valoriva =($art->preco*$model->quantidade)*($art->iva->taxaiva/100);
                    $model->taxaiva=$art->iva->taxaiva;
                }
                $model->pedido_id=$idp;

                //salvar nova linha de pedido
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
     * Updates an existing LinhaPedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $pedido_id Pedido ID
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
