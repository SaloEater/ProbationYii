<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 12:46
 */

namespace bookkeeping\tests\unit\transaction;


use Helper\Unit;

class CreateTest extends Unit
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

        $this->assertEquals($id, $transaction->id);
        $this->assertEquals($userId, $transaction->userId);
        $this->assertEquals($wealth, $transaction->wealth);
        $this->assertEquals($categoryId, $transaction->categoryId);
        $this->assertEquals($createdAt, $transaction->createdAt);
        $this->assertEquals($date, $transaction->date);
    }

}