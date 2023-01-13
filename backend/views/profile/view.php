<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Profile $model */

$this->title = 'Utilizador :'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Nome de Utilizador',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            [
                'attribute' => 'Email',
                'value' => function($model){
                    return $model->user->email;
                }
            ],
            'numcontribuinte',
            'telemovel',
            'estado',
        ],
    ]) ?>

</div>
