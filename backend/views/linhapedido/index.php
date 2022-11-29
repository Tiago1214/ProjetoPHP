<?php

use backend\models\LinhaPedido;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\LinhaPedidoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Linha Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Linha Pedido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data',
            'preco',
            'iva',
            'pedido_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LinhaPedido $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'pedido_id' => $model->pedido_id]);
                 }
            ],
        ],
    ]); ?>


</div>
