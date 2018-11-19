<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:52
 */

namespace bookkeeping\forms\manage\bookkeeping;


use bookkeeping\entities\Account;
use bookkeeping\entities\User;
use yii\base\Model;

class AccountForm extends Model
{
    public $userId;
    public $wealth;

    private $_account;

    public function __construct(Account $account = null, array $config = [])
    {
        if ($account) {
            $this->userId = $account->userId;
            $this->wealth = $account->wealth;
            $this->_account = $account;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['userId'], 'unique', 'targetClass' => User::class],
        ];
    }

}