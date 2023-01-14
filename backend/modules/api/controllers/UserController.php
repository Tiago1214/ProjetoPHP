<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\AuthAssignment;
use common\models\Profile;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class UserController extends Controller
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth'=>[$this,'auth'],
        ];
        return $behaviors;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if($action==="delete"||$action==="update"||$action==="create"||$action==="index"||$action==="view")
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações','403');
        }
    }

    //Redefinir métodos
    public function actions()
    {
        $actions= parent::actions();
        return $actions;
    }

    public function actionAuth(){
        return $this->user->auth_key;
    }

    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            //limitar inicio de sessão a clientes
            $roles=AuthAssignment::find()->all();
            foreach ($roles as $role){
                if($role->user_id==$user->id){
                    if($role->item_name=='admin'||$role->item_name=='funcionario'){
                        throw new ForbiddenHttpException('O utilizador tem de ter o role cliente para poder iniciar sessão','404');
                    }
                }
            }
            $this->user=$user; //Guardar user autenticado
            return $user;
        }
        throw new \yii\web\ForbiddenHttpException('No authentication','403'); //403
    }
}
