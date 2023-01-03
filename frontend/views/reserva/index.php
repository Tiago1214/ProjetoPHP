<?php

use common\models\Reserva;
use common\models\Profile;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/** @var yii\web\View $this */
/** @var common\models\ReservaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Minhas Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index container-fluid">
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>


    <h1 style="text-align: center; font-size: 50px;font-weight:bold"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'data',
            'hora',
            'nrpessoas',
            [
                'attribute' => 'estado',
                'value' => function ($model) {
                    if ($model->estado == 0) {
                        return 'Á espera de confirmação';
                    } else if ($model->estado == 1) {
                        return 'Confirmado';
                    } else if ($model->estado == 2) {
                        return 'Cancelado';
                    } else {
                        return 'Erro';
                    }
                }
            ],
            [
                'buttons' => [
                    'cancelar' => function($url,$model, $id) {     // render your custom button
                        if($model->estado==0){
                            return Html::a('Cancelar', ['cancelar', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Tem a certeza que pretende cancelar a reserva?',
                                    'method' => 'post',
                                ],]);
                            }
                        }
                    ],
                'class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{cancelar}',
                'urlCreator' => function ($action, Reserva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
    <?php if ($dataProvider == null) {
        echo "<h1>Não existem registos de reservas</h1>";
    } ?>
</div>
