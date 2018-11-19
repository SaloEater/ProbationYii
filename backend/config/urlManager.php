<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.10.2018
 * Time: 15:11
 */

/** @var array $params */

return [
    'class' => 'yii\web\urlManager',
    'hostInfo' => $params['backendHostInfo'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '<_a:login|logout>' => 'auth/<_a>',
        'site/login' => 'auth/login',
        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w -]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ]
];