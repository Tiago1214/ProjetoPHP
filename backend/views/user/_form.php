<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Criar novo utilizador';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="row">
        <div class="col-lg-12">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?php ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'numcontribuinte') ?>

            <?= $form->field($model, 'telemovel') ?>

            <?=$form->field($model,'role')->dropDownList([0=>'funcionario',1=>'admin'])?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Criar Conta', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
