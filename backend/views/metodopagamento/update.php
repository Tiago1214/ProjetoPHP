<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MetodoPagamento $model */

$this->title = 'Atualizar Método Pagamento: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Metodo Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="metodo-pagamento-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
