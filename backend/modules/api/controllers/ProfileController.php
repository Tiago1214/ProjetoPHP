<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;

class ProfileController extends ActiveController
{
    public $modelClass = 'common\models\Profile';

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
