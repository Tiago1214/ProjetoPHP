<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::to('../site/index'); ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="card">
                <div class="margin">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default"><?= Yii::$app->user->identity->username; ?></button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <?= Html::a('Atualizar email', ['/user/update','id'=>Yii::$app->user->getId()], ['data-method' => 'post', 'class' => 'dropdown-item nav-link']) ?>
                            <?= Html::a('Atualizar password', ['/user/updatepassword','id'=>Yii::$app->user->getId()], ['data-method' => 'post', 'class' => 'dropdown-item nav-link']) ?>
                            <div class="dropdown-divider"></div>
                            <?= Html::a('<i class="fas fa-sign-out-alt">Terminar Sessão</i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        </div>
                    </div>
                </div>
        </div>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->