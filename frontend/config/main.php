<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'name' => 'ТАСС - выборы президента 2018',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'/*, 'assetsAutoCompress'*/],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => ['/js/jquery-3.2.1.min.js'],
                ],
                // 'yii\bootstrap\BootstrapAsset' => [
                //     'js' => ['/js/bootstrap.min.js'],
                //     'css' => ['/css/bootstrap.min.css']
                // ],
            ]
        ],
        'request' => [
            'baseUrl' => '/',
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => '23865687409',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'candidate/<id:\d>' => 'site/candidate',
                //'<action:\w+>/<alias>' => 'site/<action>',
                // 'page/<alias>' => 'site/page',
                // 'preview/<alias>' => 'site/preview',
                // 'category/<alias:\w+>' => 'site/category',
            ],
        ],
    ],
    'params' => $params,
];
