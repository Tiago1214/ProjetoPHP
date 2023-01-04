<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

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
            echo DatePicker::widget([
                    'name' => 'data',
                    'attribute'=>'data',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,

                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
]);
        ?>

        <?php echo TimePicker::widget(['model' => $model, 'attribute' => 'hora']); ?>

        <?= $form->field($model, 'nrpessoas')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>


</div>
