<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 09.10.2018
 * Time: 18:48
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/test-local.php'),
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    require(__DIR__ . '/test.php'),
    [
    ]
);
