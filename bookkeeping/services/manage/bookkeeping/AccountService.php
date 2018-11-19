<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:56
 */

namespace bookkeeping\services\manage\bookkeeping;


use bookkeeping\entities\Account;
use bookkeeping\forms\manage\bookkeeping\AccountForm;
use bookkeeping\repositories\bookkeeping\AccountRepository;

class AccountService
{

    private $accounts;

    public function __construct(AccountRepository $accounts)
    {
        $this->accounts = $accounts;
    }

    public function create(AccountForm $form)
    {
        $account = Account::create(
            $form->userId,
            $form->wealth
        );
        $this->accounts->save($account);
    }

    public function createForId($userId)
    {
        $account = Account::create(
            $userId,
            0
        );
        $this->accounts->save($account);
    }

    public function edit(AccountForm $form)
    {
        $account = $this->accounts->get($form->userId);

        $account->setUsername($form->username);
        $account->setWealth($form->wealth);

        $this->accounts->save($account);
    }

    public function remove($userId)
    {
        $account = $this->accounts->get($userId);
        $this->accounts->remove($account);
    }
}