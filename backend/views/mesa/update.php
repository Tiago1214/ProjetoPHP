<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Mesa $model */

$this->title = 'Atualizar Mesa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mesa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
