<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\db\ActiveRecord;
use yii\filters\auth\QueryParamAuth;
use common\models\Artigo;
use yii\filters\auth\HttpBasicAuth;

class ArtigoController extends ActiveRecord
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


    public function actionIndex()
    {
        return $this->render('index');
    }

    
}
