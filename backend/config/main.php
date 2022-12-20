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
            'name' => 'advanced-backend',
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
                ['class' => 'yii\rest\UrlRule','controller' =>'api/artigo'],
                ['class' => 'yii\rest\UrlRule','controller' =>'api/categoria'],
                ['class' => 'yii\rest\UrlRule','controller' =>'api/comentario'],
                ['class' => 'yii\rest\UrlRule','controller' =>'api/reserva'],
                ['class' => 'yii\rest\UrlRule','controller' =>'api/linhapedido'],
                ['class' => 'yii\rest\UrlRule','controller' =>'api/pedido'],
                ['class' => 'yii\rest\UrlRule','controller' =>'api/profile'],
                ['class' => 'yii\rest\UrlRule','controller' =>'api/user'],
            ],
        ],
    ],
    'params' => $params,
];
