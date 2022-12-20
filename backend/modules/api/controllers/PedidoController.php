<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class PedidoController extends ActiveController
{
    public $modelClass = 'common\models\Pedido';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
