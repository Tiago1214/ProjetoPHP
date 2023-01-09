<?php

namespace backend\controllers;

use backend\models\MetodoPagamento;
use backend\models\MetodoPagamentoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MetodoPagamentoController implements the CRUD actions for MetodoPagamento model.
 */
class MetodopagamentoController extends Controller
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
                     * Nos métodos de pagamento os funcionários só podem visualizar os métodos existentes
                     * Os admins podem realizar todas as funções
                     */
                    'class' => AccessControl::class,
                    'rules' => [
                        /**
                         *Os admins podemd realizar todas as ações nos métodos de pagamento
                         * Os funcionários só podem visualizar os registos
                         */
                        [
                            'actions' => ['login','error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['logout', 'index','view'], // add all actions to take guest to login page
                            'allow' => true,
                            'roles' => ['admin','funcionario'],
                        ],
                        [
                            'actions'=>['create','update','estado','delete'],
                            'allow'=>true,
                            'roles'=>['admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MetodoPagamento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MetodoPagamentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MetodoPagamento model.
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
     * Creates a new MetodoPagamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MetodoPagamento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MetodoPagamento model.
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
     * Deletes an existing MetodoPagamento model.
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
     * Ativar ou Desativar um método de Pagamento.
     * Dependendo se o item está ativado ou não esta função vai fazer com que o estado se mude de forma dinamica
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionEstado($id){
        $iva=$this->findModel($id);
        if($iva->estado==0){
            $iva->estado=1;
            $iva->save();
        }
        else if($iva->estado==1){
            $iva->estado=0;
            $iva->save();
        }

        return $this->redirect('../metodopagamento/index');
    }


    /**
     * Finds the MetodoPagamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MetodoPagamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MetodoPagamento::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
