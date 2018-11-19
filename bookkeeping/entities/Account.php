<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:31
 */

namespace bookkeeping\entities;


use yii\db\ActiveRecord;

//TODO Добавить валюту

/**
 * @property integer $userId
 * @property float wealth
 */
class Account extends ActiveRecord
{
    public static function create($userId, $wealth): self
    {
        $account = new static();
        $account->userId = $userId;
        $account->wealth = $wealth;

        return $account;
    }

    public static function tableName()
    {
        return '{{%accounts}}';
    }

    /**
     * @param float $wealth
     */
    public function setWealth(float $wealth): void
    {
        $this->wealth = $wealth;
    }

    public function resetWealth()
    {
        $this->wealth = 0;
    }

    public function add(float $value)
    {
        $this->wealth += $value;
    }

    public function take(float $value)
    {
        if ($this->wealth < $value) {
            throw new \InvalidArgumentException('Account has not enough currency');
        }
        $this->wealth -= $value;
    }
}