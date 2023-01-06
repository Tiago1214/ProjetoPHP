<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Mesa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="mesa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nrmesa')->textInput() ?>

    <?= $form->field($model, 'nrlugares')->textInput() ?>

    <?= $form->field($model, 'tipomesa')->dropDownList(['quadrada','circular','retangular']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
