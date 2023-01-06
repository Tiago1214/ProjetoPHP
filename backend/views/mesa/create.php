<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Mesa $model */

$this->title = 'Criar Mesa';
$this->params['breadcrumbs'][] = ['label' => 'Mesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mesa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
