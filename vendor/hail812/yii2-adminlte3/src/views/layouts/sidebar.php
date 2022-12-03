<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Url::to('../site/index'); ?>" class="d-block"><?= Yii::$app->user->identity->username; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Pedido',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">3</span>',
                        'items' => [
                            ['label' => 'Visualizar todos os pedidos', 'url' => ['pedido/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar Pedido', 'iconStyle' => 'far','url' => ['pedido/create']],
                        ]
                    ],
                    [
                        'label' => 'Utilizadores',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">3</span>',
                        'items' => [
                            ['label' => 'Visualizar todos os Utilizadores', 'url' => ['user/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar Utilizador', 'iconStyle' => 'far','url' => ['user/create']],
                        ]
                    ],
                    [
                        'label' => 'Reservas',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Visualizar Reservas', 'url' => ['reserva/index'], 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Artigos',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Visualizar Artigos', 'url' => ['artigo/index'], 'iconStyle' => 'far'],
                            ['label' => 'Editar Artigos', 'iconStyle' => 'far'],
                            ['label' => 'Desativar Artigos', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Categorias', 'iconStyle' => 'far'],
                    ['label' => 'Iva', 'iconStyle' => 'far'],
                    ['label' => 'Comentário', 'iconStyle' => 'far'],
                    ['label' => 'Empresa', 'iconStyle' => 'far'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>