<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\bootstrap5\Modal;

/** @var yii\web\View $this */
/** @var common\models\Reserva $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reserva-form">
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="container">
        <h1 style="text-align: center">Criar Reserva</h1>
        <?php $form = ActiveForm::begin(); ?>

        <?php
        echo  '<label class="form-label">Birth Date</label>';
        echo  $form->field($model,'data')->widget(DatePicker::className(),[
            'value' => '01/29/2014',
            'removeButton' => false,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'mm/dd/yyyy'
            ]
        ]);
        ?>

        <?=$form->field($model,'hora')->textInput()?>

        <?= $form->field($model, 'nrpessoas')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>


</div>
