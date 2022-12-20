<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use backend\models\Profile;


class ComentarioController extends ActiveController
{
    public $modelClass = 'common\models\Comentario';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
