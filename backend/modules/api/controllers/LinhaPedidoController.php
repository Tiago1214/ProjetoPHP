<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class LinhaPedidoController extends ActiveController
{
    public $modelClass = 'common\models\LinhaPedidoController';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
