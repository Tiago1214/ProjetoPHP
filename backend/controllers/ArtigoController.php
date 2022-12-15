<?php

namespace backend\controllers;

use backend\models\Artigo;
use backend\models\ArtigoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * ArtigoController implements the CRUD actions for Artigo model.
 */
class ArtigoController extends Controller
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
     * Lists all Artigo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArtigoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artigo model.
     * @param int $id ID
     * @param int $categoria_id Categoria ID
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
     * Creates a new Artigo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Artigo();
        $iva=\backend\models\Iva::find()->all();
        $categoria=\backend\models\Categoria::find()->all();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->data=Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
                $model->save();
                $artigoId=$model->id;
                $image=UploadedFile::getInstance($model,'imagem');
                $imgName='art_'. $artigoId . '.' . $image->getExtension();
                $image->saveAs(Yii::getAlias('@artigoImgPath').'/'.$imgName);
                $model->imagem=$imgName;
                $model->imagemurl='http://localhost/gersoft/images'.'/'.$model->imagem;
                $model->save();

                return $this->redirect(['view', 'id' => $model->id, 'categoria_id' => $model->categoria_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'iva'=>$iva,
            'categoria'=>$categoria,
        ]);
    }

    /**
     * Updates an existing Artigo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @param int $categoria_id Categoria ID
     * @param int $iva_id  ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $iva=\backend\models\Iva::find()->all();
        $categoria=\backend\models\Categoria::find()->all();
        if ($this->request->isPost){
            if($model->load($this->request->post())) {
                $artigoId=$model->id;
                $image=UploadedFile::getInstance($model,'imagem');
                if($image!=null){
                    $imgName='art_'. $artigoId . '.' . $image->getExtension();
                    $image->saveAs(Yii::getAlias('@artigoImgPath').'/'.$imgName);
                    $model->imagem=$imgName;
                    $model->imagemurl='http://localhost/gersoft/images'.'/'.$model->imagem;
                    $model->save();
                }
                else{

                }
                return $this->redirect(['view', 'id' => $model->id,]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'iva'=>$iva,
            'categoria'=>$categoria,
        ]);
    }

    /**
     * Deletes an existing Artigo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @param int $categoria_id Categoria ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $categoria_id)
    {
        $this->findModel($id, $categoria_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Ativar ou Desativar uma categoria.
     * Dependendo se o item está ativado ou não esta função vai fazer com que se mude o estado da categoria
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionEstado($id){
        $artigo=$this->findModel($id);

        if($artigo->estado==0){
            $artigo->estado=1;
            $artigo->save();
        }
        else if($artigo->estado==1){
            $artigo->estado=0;
            $artigo->save();
        }

        return $this->redirect('../artigo/index');
    }

    /**
     * Finds the Artigo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @param int $categoria_id Categoria ID
     * @return Artigo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artigo::findOne(['id' => $id,])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
