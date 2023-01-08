<?php

namespace backend\controllers;

use common\models\Artigo;
use common\models\LinhaPedido;
use common\models\LinhaPedidoSearch;
use common\models\Pedido;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $model = new LinhaPedido();
        $pedido=Pedido::find()->where(['id'=>$idp])->all();
        $linhaspedido=LinhaPedido::find()->where(['pedido_id'=>$idp])->all();
        $artigo=Artigo::find()->where(['estado'=>[1]])->all();

        //teste alterar quantidade pela grid view
        $searchModel = new LinhaPedidoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                foreach($linhaspedido as $quant){
                    if($quant->artigo_id==$model->artigo_id){
                        $quant->quantidade=$quant->quantidade+$model->quantidade;
                        $quant->save(false);
                        return $this->redirect(['create', 'idp' => $idp]);
                    }
                }
                $findartigo=Artigo::find()->where(['id'=>$model->artigo_id])->all();
                foreach($findartigo as $art){
                    $model->valorunitario=$art->preco;
                    $model->valoriva =$art->preco*($art->iva->taxaiva/100);
                    $model->taxaiva=$art->iva->taxaiva;
                }
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
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
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

    public function actionEditquantidade($idlp){
        $linha=$this->findModel($idlp);
        $linha->save(false);
        return $this->redirect(['create', 'idp' => $linha->pedido_id]);
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
