<?php

namespace backend\modules\api;

/**
 * api module definition class
 */
class ModuleAPI extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        ini_set( 'serialize_precision', -1 );

        \Yii::$app->user->enableSession = false;
    }
}
