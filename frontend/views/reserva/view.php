<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Reserva $model */

$this->title = $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reserva-view">
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

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
        ],
    ]) ?>

</div>
