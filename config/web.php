<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'FMkniYwzX6SFS-AOVfdXKEEM83bu1rhH',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
            //'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/autoria-projeto'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/projeto'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/autoria-publicacao'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/publicacao'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/instituicao'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/escola'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/docente'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/diretor'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/departamento'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/coordenador'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/utilizador'],
                [ 'class' => 'yii\rest\UrlRule','controller'=>'rest/desporto'],
            ],

        ]
    ],
    'params' => $params,
    'modules' => [
        'user' => [
            'class' => 'amnah\yii2\user\Module',
            'requireEmail'=>false,
            'requireUsername'=>true,
        ],
        'rest' => [
            'class' => 'app\modules\rest\Module',
        ],

    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
