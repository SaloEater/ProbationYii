<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 13:50
 */

namespace bookkeeping\entities;


use yii\db\ActiveRecord;

/**
 * Class Transaction
 * @package bookkeeping\entities
 * @property int $id
 * @property int $userId
 * @property float $wealth
 * @property int $categoryId
 * @property int $createdAt
 * @property int $date
 */
class Transaction extends ActiveRecord
{

    public static function create($id, $userId, $wealth, $categoryId, $createdAt, $date): self
    {
        $transaction = new static();
        $transaction->id = $id;
        $transaction->userId = $userId;
        $transaction->wealth = $wealth;
        $transaction->categoryId = $categoryId;
        $transaction->createdAt = $createdAt;
        $transaction->date = $date;

        return $transaction;
    }

    public static function tableName()
    {
        return '{{%transactions}}';
    }

    public function __toString()
    {
        $stringDate = date('d-m-Y', $this->date);
        return "$this->wealth было потрачено $stringDate";
    }

}