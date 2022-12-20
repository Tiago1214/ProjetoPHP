<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class ProfileController extends ActiveController
{
    public $modelClass = 'common\models\Profile';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
