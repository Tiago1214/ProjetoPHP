<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Profile;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use common\models\User;
use Yii;

class DadosuserController extends ActiveController
{
    public $modelClass = 'common\models\Artigo';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
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

    //ir buscar os dados do utilizador com sessão iniciada
    public function actionDadosutilizador(){
        $user=User::find()->where(['id'=>Yii::$app->params['id']])->one();
        $profile=Profile::find()->where(['user_id'=>Yii::$app->params['id']])->one();
        if($user!=null && $profile!=null){
            return [
                'user_id'=>$user->id,'username'=>$user->username,'email'=>$user->email,'profile_id'=>$profile->id,
                'numcontribuinte'=>$profile->numcontribuinte,'telemovel'=>$profile->telemovel,
            ];
        }
        return null;
    }

    //ir buscar os dados do utilizador com sessão iniciada
    public function actionProfileid(){
        $user=User::find()->where(['id'=>Yii::$app->params['id']])->one();
        $profile=Profile::find()->where(['user_id'=>Yii::$app->params['id']])->one();
        if($user!=null && $profile!=null){
            return $profile->id;
        }
        throw new  \yii\web\ForbiddenHttpException('Não existem dados deste utilizador','404');
    }

    public function actionUsers(){
        $user=User::find()->all();
        return $user;
    }
}

