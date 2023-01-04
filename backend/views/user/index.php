<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == 9){
                        return 'Desativado';
                    }
                    else if($model->status==10){
                        return 'Ativado';
                    }
                    else{
                        return 'Erro';
                    }
                }
            ],
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                'buttons' => [
                    'updateprof' => function($url,$model, $id) {     // render your custom button
                        return Html::a('Update', ['/profile/update', 'id' => $model->profile->id], ['class'=>'btn btn-success btn-sm']) ;
                    }
                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{updateprof}{Ativar}',
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
