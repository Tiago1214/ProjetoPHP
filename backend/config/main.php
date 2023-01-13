<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
        'class' => 'backend\modules\api\ModuleAPI'],
    ],
    'components' => [
        // setup Krajee Pdf component

        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [ 'application/json' => 'yii\web\JsonParser',]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'AuthSession',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/artigo',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',
                        '{nome}' => '<nome:[\w\s]+>'

                    ],
                    'extraPatterns' => [
                        'GET artigosdacategoria/{nome}'=>'artigosdacategoria',
                        'GET artigoponome/{nome}'=>'artigoponome',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/categoria',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',
                        '{nome}' => '<nome:[\w\s]+>'
                    ],
                    'extraPatterns' => [
                        'GET categorianome/{nome}'=>'categorianome',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/comentario',
                    'tokens' => [

                        '{id}'    => '<id:\\d+>',
                        '{titulo}' => '<titulo:[\w\s+]+>'
                    ],
                    'extraPatterns' => [
                        'GET meuscomentarios'=>'meuscomentarios',
                        'GET titulo/{titulo}'=>'titulo',
                        'DELETE apagarmeuscomentarios'=>'apagarmeuscomentarios',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/reserva',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',

                    ],
                    'extraPatterns' => [
                        'GET minhasreservas/{id}'=>'minhasreservas',
                        'PUT cancelarreserva/{id}'=>'cancelarreserva',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/linhapedido',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',

                    ],
                    'extraPatterns' => [
                        'GET linhasdopedido/{id}'=>'linhasdopedido',
                        'GET linhaspedidoestatisca/{id}'=>'linhaspedidoestatistica',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/pedido',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',
                    ],
                    'extraPatterns' => [
                        'GET totalgasto'=>'totalgasto',
                        'GET nrtotalpedidos'=>'nrtotalpedidos',
                        'GET meuspedidos'=>'meuspedidos',
                        'GET pedidosconcluidos'=>'pedidosconcluidos',
                        'GET pedidoscancelados'=>'pedidoscancelados',
                        'PUT cancelarpedido/{id}'=>'cancelarpedido',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/mesa',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',
                    ],
                    'extraPatterns' => [

                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/metodopagamento',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',
                    ],
                    'extraPatterns' => [

                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',
                    ],
                    'extraPatterns' => [
                        'GET auth'=>'auth',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/dadosuser',
                    'tokens' => [
                        '{id}'    => '<id:\\d+>',
                    ],
                    'extraPatterns' => [
                        'GET dadosutilizador'=>'dadosutilizador',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
