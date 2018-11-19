<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            #'class' => 'yii\caching\FileCache',
            #'cachePath' => '@common/runtime/cache'
            'class' => 'yii\caching\memCache',
            'useMemcached' => true,
        ],
        'backendUrlManager' => __DIR__.'/../../backend/config/urlManager.php',
        'frontendUrlManager' => __DIR__.'/../../frontend/config/urlManager.php',
        'urlManager' => function () {
            return Yii::$app->get('frontendUrlManager');
        },
    ],
];
