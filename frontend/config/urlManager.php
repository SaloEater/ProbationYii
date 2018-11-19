<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.10.2018
 * Time: 15:11
 */


return [
    'class' => 'yii\web\urlManager',
    'hostInfo' => $params['frontendHostInfo'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '' => 'site/index',
        '<_a:login|logout>' => 'auth/auth/<_a>',
        'signup/<_a:[\w-]+>' => 'auth/signup/<_a>',
        'signup' => 'auth/signup/signup',
        '<_a:contact>' => 'contact/<_a>',
        '<_a:about' => 'site/<_a>',


        //site/... redirects
        'site/login' => 'auth/auth/login',
        'site/<_a:[\w-]+>' => 'site/<_a>',

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w -]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ]
];