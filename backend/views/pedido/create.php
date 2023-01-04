<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Pedido $model */

$this->title = 'Create Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'metodo_pagamento'=>$metodo_pagamento, 'mesa'=>$mesa
    ]) ?>

</div>
