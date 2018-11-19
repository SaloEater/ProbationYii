<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 09.11.2018
 * Time: 20:27
 */

namespace common\bootstrap;

use bookkeeping\repositories\bookkeeping\TransactionRepository;
use bookkeeping\repositories\UserRepository;
use bookkeeping\services\auth\PasswordResetService;
use bookkeeping\services\contact\ContactService;
use bookkeeping\services\manage\bookkeeping\TransactionService;
use yii\base\BootstrapInterface;
use Yii;

class SetupServices implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = \Yii::$container;

        $container->setSingleton(PasswordResetService::class, [], [
            [Yii::$app->params['supportEmail'] => Yii::$app->name.' robot'],
            Yii::$app->mailer,
        ]);

        $container->setSingleton(ContactService::class, [], [
            [Yii::$app->params['supportEmail'] => Yii::$app->name.' robot'],
            Yii::$app->params['adminEmail'],
        ]);
    }
}