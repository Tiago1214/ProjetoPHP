<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;
use common\models\Comentario;

class ComentarioController extends ActiveController
{
    public $modelClass = 'common\models\Comentario';

    public function behaviors()
    {
        Yii::$app->params['auth_user_id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    //atribuir permissões
    public function checkAccess($action, $model = null, $params = [])
    {
        if($action==="index"||$action=="view"||$action==="delete")
        {
            throw new \yii\web\ForbiddenHttpException('Proibido');
        }
    }

    public function actionIndex()
    {
        return $this->render('index');
    }


    //Fazer pesquisa dos comentarios do utilizador com sessão iniciada
    public function actionMeuscomentarios($id){
        $comentario_search=Comentario::find()->where(['profile_id'=>$id])->all();
        if($comentario_search!=null){
            return $comentario_search;
        }
        return 'Este utilizador não tem nenhum comentário criado';
    }

    //Fazer pesquisa de comentario por titulo em vez de id, ou seja usar texto na url
    //para preencher os espaços na url é usar o + no lugar dos espaços
    public function actionTitulo($titulo){
        $comentario_search=Comentario::find()->where(['titulo'=>$titulo])->all();
        if($comentario_search!=null){
            return $comentario_search;
        }
        return 'Não existe nenhum comentário com este titulo';
    }


    //Apagar os comentários do utilizador com sessão iniciada
    public function actionApagarmeuscomentarios($id){
        $comentario_delete=Comentario::deleteAll(['profile_id'=>$id]);
        if($comentario_delete!=null){
            return 'Os comentário número '.$id.' foi apagado com sucesso!';
        }
        return 'Este utilizador não tem nenhum comentário para apagar';
    }

}
