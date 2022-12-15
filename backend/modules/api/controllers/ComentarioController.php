<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class ComentarioController extends ActiveController
{
    public $modelClass = 'backend\modules\api\models\Comentario';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
