<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Comentario $model */

$this->title = 'Criar Comentario';
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
