<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;

class LinhaPedidoController extends ActiveController
{
    public $modelClass = 'common\models\LinhaPedidoController';

    public function behaviors()
    {
        Yii::$app->params['auth_user_id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
