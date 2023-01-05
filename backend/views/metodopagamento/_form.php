<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\MetodoPagamento $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="metodo-pagamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomepagamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList([0=>'Desativo',1=>'Ativo']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
