<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

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
                            ['label' => 'Visualizar todos os pedidos', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar Pedido', 'iconStyle' => 'far'],
                            ['label' => 'Editar Pedido', 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Utilizadores',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">3</span>',
                        'items' => [
                            ['label' => 'Visualizar todos os Utilizadores', 'url' => ['user/index'], 'iconStyle' => 'far'],
                            ['label' => 'Criar Utilizador', 'iconStyle' => 'far'],
                            ['label' => 'Editar Utilizador', 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Reservas',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Visualizar Reservas', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Editar Estado da Reserva', 'iconStyle' => 'far'],
                        ]
                    ],
                    [
                        'label' => 'Artigos',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Visualizar Artigos', 'url' => ['site/index'], 'iconStyle' => 'far'],
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