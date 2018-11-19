<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 18:01
 */

namespace bookkeeping\repositories\bookkeeping;


use bookkeeping\entities\Account;
use bookkeeping\repositories\IRepository;
use yii\web\NotFoundHttpException;

class AccountRepository extends IRepository
{
    public function __construct()
    {
        $this->type = Account::class;
    }

    public function get($userId): Account
    {
        if (!$account = $this->getBy(
            ['userId' => $userId]
        )) {
            throw new NotFoundHttpException('Account is not found');
        }

        return $account;
    }

    public function save(Account $account)
    {
        if (!$account->save()) {
            throw new \RuntimeException('Account saving error');
        }
    }

    public function remove(Account $account)
    {
        if (!$account->delete()) {
            throw new \RuntimeException('Account removing error');
        }
    }
}