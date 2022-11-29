<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PedidoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'tipo_pedido') ?>

    <?= $form->field($model, 'profile_id') ?>

    <?php // echo $form->field($model, 'metodo_pagamento_id') ?>

    <?php // echo $form->field($model, 'mesa_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
