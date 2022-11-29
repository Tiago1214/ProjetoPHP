<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\LinhaPedido $model */

$this->title = 'Create Linha Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Linha Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linha-pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
