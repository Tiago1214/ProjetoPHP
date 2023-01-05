<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\Artigo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="artigo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>
    <?php echo $form->field($model, 'imagem')->hiddenInput(['value'=> $model->imagem])->label(false); ?>

    <?= $form->field($model, 'iva_id')->dropDownList(
            \yii\helpers\ArrayHelper::map($iva,'id','taxaiva'), ['separator' => '<br>']
       )?>

    <?= $form->field($model, 'categoria_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($categoria,'id','nome'), ['separator' => '<br>']
    )?>

    <?= $form->field($model, 'estado')->dropDownList([0=>'Desativo',1=>'Ativo']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
