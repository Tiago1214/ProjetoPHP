<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Comentario;
use common\models\Profile;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;


class ComentarioController extends ActiveController
{
    public $modelClass = 'common\models\Comentario';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    //atribuir permissões
    public function checkAccess($action, $model = null, $params = [])
    {
        /*if()
        {
            throw new \yii\web\ForbiddenHttpException('Não pode realizar estas operações');
        }*/
    }

    public function actions()
    {
        $actions= parent::actions();
        return $actions;
    }

    //Fazer pesquisa dos comentarios do utilizador com sessão iniciada
    public function actionMeuscomentarios(){
        //aqui não se faz verificação porque caso o cliente não tenha nenhuma reserva pode entrar á mesma na aplicação android
        $comentario_search=Comentario::find()->where(['profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')])->all();
        return $comentario_search;
    }


    //Fazer pesquisa de comentario por titulo em vez de id, ou seja usar texto na url
    //para preencher os espaços na url é usar o + no lugar dos espaços
    public function actionTitulo($titulo){
        $comentario_search=Comentario::find()->where(['titulo'=>$titulo])->all();
        if($comentario_search!=null){
            return $comentario_search;
        }
        throw new \yii\web\ForbiddenHttpException( 'Não existe nenhum comentário com este titulo','404');
    }

    //Apagar todos os comentários do utilizador com sessão iniciada
    public function actionApagarmeuscomentarios(){
        $comentario_delete=Comentario::deleteAll(['profile_id'=>Profile::find()->where(['user_id'=>Yii::$app->params['id']])->select('id')]);
        if($comentario_delete!=null){
            return 'Os comentários foram apagados com sucesso!';
        }
        throw new \yii\web\ForbiddenHttpException('Este utilizador não tem nenhum comentário para apagar','404');
    }
}
