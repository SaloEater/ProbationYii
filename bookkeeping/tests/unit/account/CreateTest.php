<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:34
 */

namespace bookkeeping\tests\unit\account;

use bookkeeping\entities\Account;
use Helper\Unit;

class CreateTest extends Unit
{
    public function testSuccess()
    {
        $account = Account::create(
            $userId = -1,
            $username = 'test_username',
            $wealth = 1
        );

        $this->assertEquals($userId, $account->userId);
        $this->assertEquals($username, $account->username);
        $this->assertEquals($wealth, $account->wealth);
    }
}