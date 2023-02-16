<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\bootstrap5\Modal;
use kartik\icons\FontAwesomeAsset;

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
        <div class="col-4">
            <?php
            echo  $form->field($model,'data')->widget(DatePicker::className(),[
                'value' => Yii::$app->formatter->asDate('now', 'php:d-m-Y'),
                'removeButton' => false,
                'layout' => '{picker} {remove} {input}',
                'options' => [
                    'type' => 'text',
                    'readonly' => true,
                    'class' => 'text-muted small',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd/mm/yyyy',
                ],
            ]);
            ?>


            <?php  echo  $form->field($model,'hora')->widget(TimePicker::className(),[
                'name' => 'hora',
                'attribute'=>'hora',
                'pluginOptions' => [
                    'showSeconds' => false,
                    'showMeridian' => false,
                    'minuteStep' => 15,

                ],
                'options' => [
                    'type' => 'text',
                    'readonly' => true,
                    'class' => 'text-muted small',
                ],

            ]);
            ?>

            <?= $form->field($model, 'nrpessoas')->textInput() ?>

        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>


</div>
