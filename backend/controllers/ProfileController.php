<?php

namespace backend\controllers;

use backend\models\CriarUsers;
use common\models\Profile;
use common\models\ProfileSearch;
use common\models\Reserva;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
                     * Nos perfis os admins podem realizar qualquer ação enquanto
                     * os funcionários só podem visualizar os perfis e editar o próprio.
                     */
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login','error'],
                            'allow' => true,
                        ],
                        [
                            'actions'=>['logout', 'index','update'],
                            'allow'=>true,
                            'roles'=>['admin','funcionario'],
                        ],
                        [
                            'actions' => ['view','estado','delete','create'], // add all actions to take guest to login page
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        //mostrar todos os utilizadores menos o utilizador que tem sessão iniciada
        $dataProvider = new ActiveDataProvider([
            'query' => Profile::find()->where(['!=','user_id',Yii::$app->user->getId()])
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
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
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model= new CriarUsers();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {

            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->redirect('../user/index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
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
     * Ativar ou Desativar uma categoria.
     * Dependendo se o item está ativado ou não esta função vai fazer com que se mude o estado da categoria
     * @param int $id ID
     */
    public function actionEstado($id){
        //Encontrar o perfil pelo id que veio da url
        $profilemodel=$this->findModel($id);
        //Na linha abaixo verificamos se o id do utilizador é igual ao user que está no perfil que veio no url
        $users=User::find()->where(['id'=>$profilemodel->user_id])->all();
        if($profilemodel->estado==0){
            //Correr o user
            foreach($users as $user){
                //Caso o user seja igual ao que tem sessão iniciada é impossivel desativar o mesmo, pois o mesmo ia deixar de ter a conta ativa
                if($user->id==Yii::$app->user->getId()){
                    return null;
                }
                $user->status=10;
                $user->update(false);
            }
            $profilemodel->estado=1;
            $profilemodel->save();
        }
        else if($profilemodel->estado==1){
            //Correr o user
            foreach($users as $user){
                //Validação
                if($user->id==Yii::$app->user->getId()){
                    return null;
                }
                $user->status=9;
                $user->update(false);
            }
            $profilemodel->estado=0;
            $profilemodel->save();
        }

        return $this->redirect('../profile/index');
    }
    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModel1($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
