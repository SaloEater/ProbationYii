<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 15:31
 */

namespace bookkeeping\repositories\bookkeeping;


use bookkeeping\entities\Transaction;
use bookkeeping\repositories\IRepository;

class TransactionRepository extends IRepository
{

    public function __construct()
    {
        $this->type = Transaction::class;
    }

    public function save(Transaction $transaction)
    {
        if (!$transaction->save()) {
            throw new \RuntimeException('Transaction saving error');
        }
    }

    public function remove(Transaction $transaction)
    {
        if (!$transaction->delete()) {
            throw new \RuntimeException('Transaction removing error');
        }
    }

    public function get($id): Transaction
    {
        $transactions = $this->getBy(
            ['id' => $id]
        );

        return $transactions;
    }

    public function getByUserId($userId): array
    {
        $transactions = $this->getSome(
            ['userId' => $userId]
        );

        return $transactions;
    }

    public function getByCategoryId($categoryId): array
    {
        $transactions = $this->getSome(
            ['categoryId' => $categoryId]
        );

        return $transactions;
    }

}