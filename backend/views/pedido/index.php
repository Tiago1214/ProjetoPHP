<?php

use common\models\Pedido;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PedidoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pedido', ['create'], ['class' => 'btn btn-success','options'=>['id'=>'criar-pedido']]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'profile_id',
                'value' => function($model){
                    return $model->profile->user->username;
                }
            ],
            'data',
            [
                'attribute' => 'total',
                'value' => function($model){
                    return $model->total.'€';
                }
            ],
            [
                'attribute'=>'tipo_pedido',
                'value'=>function($model){
                    if($model->tipo_pedido==0){
                        return 'Restaurante';
                    }else{
                        return 'Takeaway';
                    }
                }
            ],
            'estado',
            //'mesa_id',
            [
                'buttons' => [
                    'update' => function($url,$model, $id) {     // render your custom button
                        if($model->estado!='Concluído'&&$model->estado!='Cancelado'){
                            return Html::a('Atualizar', ['linhapedido/create', 'idp' => $id], ['class'=>'btn btn-success btn-sm']) ;
                        }
                        else if($model->estado=='Concluído'){
                            return Html::a('Fatura',['pedido/fatura','idp'=>$id],['class'=>'btn btn-info btn-sm']);
                        }
                    },
                    'cancelar'=>function($url,$model,$id) {
                        if($model->estado!='Concluído'&&$model->estado!='Cancelado'){
                            return Html::a('Cancelar',['pedido/cancelar','idp'=>$id],['class'=>'btn btn-danger btn-sm']);
                        }
                    }

                ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{cancelar}',
                'urlCreator' => function ($action, Pedido $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
