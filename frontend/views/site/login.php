<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Iniciar Sessão';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>
    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Por favor preencha os campos para iniciar sessão:</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>



                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            <p></p>
        </div>
    </div>
</div>
