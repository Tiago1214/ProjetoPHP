<?php
namespace backend\modules\api\components;
use common\models\AuthAssignment;
use Yii;
use yii\filters\auth\AuthMethod;
use yii\web\ForbiddenHttpException;

class CustomAuth extends AuthMethod
{
    public function authenticate($user, $request, $response)
    {
        $authToken = $request->getQueryString();
        $token = explode('=', $authToken)[1];
        $user = \common\models\User::findIdentityByAccessToken($token);
        //verificar se o user existe
        if (!$user) {
            throw new \yii\web\ForbiddenHttpException('No authentication'); //403
        }
        //limitar inicio de sessão a clientes
        $roles=AuthAssignment::find()->all();
        foreach ($roles as $role){
            if($role->user_id==$user->id){
                if($role->item_name=='admin'||$role->item_name=='funcionario'){
                    throw new ForbiddenHttpException('O utilizador tem de ter o role cliente para poder inicia sessão');
                }
            }
        }

        //atribuir variável de id
        Yii::$app->params['user_auth_id'] = $user->id;
        return $user;
    }
}
