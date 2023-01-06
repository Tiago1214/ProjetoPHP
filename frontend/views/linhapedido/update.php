<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LinhaPedido $model */

$this->title = 'Update Linha Pedido: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Linha Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'pedido_id' => $model->pedido_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linha-pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
