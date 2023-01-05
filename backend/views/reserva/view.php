<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Reserva $model */

$this->title = 'Reserva :'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reserva-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
                'attribute'=>'profile_id',
                'value'=>function($model){
                    return $model->profile->user->username;
                }
            ],
        ],
    ]) ?>

</div>
