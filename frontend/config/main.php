<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true, 'domain' => $params['cookieDomain']],
            'on beforeLogin' => function (yii\web\UserEvent $event) {
                /**
                 * @var common\models\User $user
                 */
                echo 'before Login';
                $user = $event->identity;
                $user->updateAttributes(['lastlogin' => time()]);
            },
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'frontendUrlManager' => require __DIR__ . '/urlManager.php',
        'backendUrlManager' => require __DIR__ . '/../../backend/config/urlManager.php',
        'urlManager' => function () {
            return Yii::$app->get('frontendUrlManager');
        },

        'db' => [
            'class' => 'yii\db\Connection',
            'driverName' => 'mysql',
            'dsn' => 'mysql:host=127.0.0.1;dbname=yii2advanced',
            'username' => 'mysql',
            'password' => 'mysql',
        ],
    ],
    'params' => $params,
];
