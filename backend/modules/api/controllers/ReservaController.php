<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class ReservaController extends ActiveController
{
    public $modelClass = 'common\models\Reserva';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
