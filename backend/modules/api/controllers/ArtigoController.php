<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Categoria;
use common\models\Comentario;
use yii\db\ActiveRecord;
use yii\filters\auth\QueryParamAuth;
use common\models\Artigo;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use Yii;

class ArtigoController extends ActiveController
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
    

    //Fazer pesquisa dos artigos pelo nome em vez de id, ou seja usar texto na url
    public function actionArtigopornome($nome){
        $artigo_search=Artigo::find()->where(['nome'=>$nome])->all();
        if($artigo_search!=null){
            return $artigo_search;
        }
        return 'Este artigo não existe';
    }

    //Fazer pesquisa de todos os artigos de uma respetiva categoria
    public function actionArtigosdacategoria($nome){
        $categoria_search=Artigo::find()->where(['categoria_id'=>Categoria::find()->where(['nome'=>$nome])->select('id')])->all();
        if($categoria_search!=null){
            return $categoria_search;
        }
        return 'Erro';
    }



}
