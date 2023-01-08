<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Mesa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mesa-form">
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancelar',['linhapedido/create','idp'=>$model->pedido_id],['class'=>'btn btn-warning'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

