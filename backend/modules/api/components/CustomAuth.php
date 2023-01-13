<?php
namespace backend\modules\api\components;
use common\models\AuthAssignment;
use common\models\User;
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

        //atribuir variável de id
        Yii::$app->params['id'] = $user->id;
        return $user;
    }
}
