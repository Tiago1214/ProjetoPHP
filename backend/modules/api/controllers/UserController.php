<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
       $behaviors = parent::behaviors();
       $behaviors['authenticator'] = [
           'class' => QueryParamAuth::className(),
           //only=> ['index'], //Apenas para o GET
       ];
       return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
