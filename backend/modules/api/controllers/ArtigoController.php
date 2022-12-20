<?php

namespace backend\modules\api\controllers;

use yii\db\ActiveRecord;

class ArtigoController extends ActiveRecord
{
    public $modelClass = 'common\models\Artigo';

    public function actionIndex()
    {

        return $this->render('index');
    }

}
