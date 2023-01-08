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
                <a href="<?= Url::to('../site/index'); ?>" class="d-block">GERSOFT</a>
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
                        'id'=>'buttonpedido',
                        'badge' => '<span class="right badge badge-info">3</span>',
                        'items' => [
                            ['label' => 'Visualizar todos os pedidos', 'url' => ['pedido/index'], 'iconStyle' => 'far','id'=>'pedido'],
                            ['label' => 'Criar Pedido', 'iconStyle' => 'far','url' => ['pedido/create']],
                        ]
                    ],
                    [
                        'label' => 'Utilizadores',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">3</span>',
                        'items' => [
                            ['label' => 'Visualizar todos os Utilizadores', 'url' => ['profile/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar Utilizador', 'iconStyle' => 'far','url' => ['profile/create']],
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

                            ['label' => 'Criar Artigo', 'url' => ['artigo/create'], 'iconStyle' => 'far'],

                        ]
                    ],
                    ['label' => 'Categorias', 'iconStyle' => 'far','url' => ['categoria/index']],
                    ['label' => 'Ivas', 'iconStyle' => 'far','url' => ['iva/index']],
                    ['label' => 'Comentários', 'iconStyle' => 'far','url' => ['comentario/index']],
                    ['label' => 'Métodos de Pagamento', 'iconStyle' => 'far','url' => ['metodopagamento/index']],
                    ['label' => 'Mesas', 'iconStyle' => 'far','url' => ['mesa/index']],
                    ['label' => 'Empresa', 'iconStyle' => 'far','url' => ['empresa/index']],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>