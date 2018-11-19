<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 12:51
 */

namespace bookkeeping\tests\unit\transaction;


use bookkeeping\entities\Account;
use bookkeeping\entities\Transaction;
use bookkeeping\services\manage\bookkeeping\TransactionService;
use Helper\Unit;

class ApplyTest extends Unit
{

    public function testSuccess()
    {
        $transaction = Transaction::create(
            $id = 1,
            $userId = 1,
            $wealth = 1,
            $categoryId = 1,
            $createdAt = time(),
            $date = time()
        );

        $account = Account::create(
            $userId = 1,
            $username = 'un',
            $wealth = 0
        );

        $transactions = \Yii::$container->get(TransactionService::class);

        $transactions->applyTo($transaction, $account);

        $this->assertNotEquals($wealth, $account->wealth);
    }

}