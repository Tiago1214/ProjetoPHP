<?php

namespace backend\modules\api\controllers;

use yii\db\ActiveRecord;
use yii\filters\auth\QueryParamAuth;

class ArtigoController extends ActiveRecord
{
    public $modelClass = 'common\models\Artigo';

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
