<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\Pedido $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'tipo_pedido')->dropDownList([0=>'Restaurante',1=>'Takeaway']) ?>

    <?= $form->field($model, 'profile_id')->textInput() ?>

    <?= $form->field($model, 'profile_id')->dropDownList([items],[options]) ?>

    <?= $form->field($model, 'metodo_pagamento_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($metodo_pagamento,'id','nomepagamento'), ['separator' => '<br>']
    )?>

    <?= $form->field($model, 'mesa_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($mesa,'id','nrmesa'), ['separator' => '<br>']
    )?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
