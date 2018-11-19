<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 13:58
 */

namespace bookkeeping\forms\manage\bookkeeping;


use bookkeeping\entities\Transaction;
use yii\base\Model;

class TransactionForm extends Model
{
    public $id;
    public $userId;
    public $wealth;
    public $categoryId;
    public $createdAt;
    public $date;

    private $_transaction;

    public function __construct(Transaction $transaction = null, array $config = [])
    {
        if ($transaction) {
            $this->id = $transaction->id;
            $this->userId = $transaction->userId;
            $this->wealth = $transaction->wealth;
            $this->categoryId = $transaction->categoryId;
            $this->createdAt = $transaction->createdAt;
            $this->date = $transaction->date;
            $this->_transaction = $transaction;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['id'], 'unique', 'targetClass' => Transaction::class],
            [['userId'], 'unique', 'targetClass' => Transaction::class],
        ];
    }
}