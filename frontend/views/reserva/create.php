<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Reserva $model */

$this->title = 'Create Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-create">
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <div class="row"><p></p></div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
