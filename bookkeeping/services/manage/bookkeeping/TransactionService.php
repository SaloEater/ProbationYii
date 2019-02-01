<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 15:17
 */

namespace bookkeeping\services\manage\bookkeeping;


use bookkeeping\entities\Account;
use bookkeeping\entities\Transaction;
use bookkeeping\forms\manage\bookkeeping\TransactionForm;
use bookkeeping\repositories\bookkeeping\TransactionRepository;

class TransactionService
{
    /**
     * @var TransactionRepository $repositories
     */
    private $transactions;

    public function __construct(TransactionRepository $transactions)
    {
        $this->transactions = $transactions;
    }

    public function create(TransactionForm $form): Transaction
    {
        $transaction = Transaction::create(
            $form->id,
            $form->userId,
            $form->wealth,
            $form->categoryId,
            $form->createdAt,
            $form->date
        );

        $this->transactions->save($transaction);

        return $transaction;
    }

    //TODO: get in date interval

    public function apply(Transaction $transaction)
    {
        $services = \Yii::$container->get(TransactionRepository::class);
        $account = $services->get($transaction->userId);
        $this->applyTo($transaction, $account);
    }

    public function applyTo(Transaction $transaction, Account $account)
    {
        $account->add($transaction->wealth);
    }

    public function removeById($id)
    {
        $transaction = $this->transactions->get($id);
        $this->transactions->remove($transaction);
    }
}