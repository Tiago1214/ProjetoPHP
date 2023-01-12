<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Artigo;
use common\models\Categoria;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;

class CategoriaController extends ActiveController
{
    public $modelClass = 'common\models\Categoria';

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
