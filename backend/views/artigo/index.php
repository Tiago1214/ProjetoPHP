<?php

use backend\models\Artigo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ArtigoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Artigos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artigo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Artigo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'descricao',
            'referencia',
            'quantidade',
            'preco',
            //'data',
            //'imagem',
            [
                'attribute' => 'iva_id',
                'value' => function($model){
                    return $model->iva->taxaiva.'%';
                }
            ],
            [
                'attribute' => 'categoria_id',
                'value' => function($model){
                    return $model->categoria->nome;
                }
            ],
            'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Artigo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'categoria_id' => $model->categoria_id]);
                 }
            ],
        ],
    ]); ?>


</div>
