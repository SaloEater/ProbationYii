<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 22:14
 */

namespace bookkeeping\tests\unit\profile;


use Helper\Unit;

class CreateTest extends Unit
{
    public function testSuccess()
    {
        $profile = Profile::create(
            $userId = -1,
            $surname = 'test_surname',
            $name = 'test_name'
        );

        $this->assertEquals($userId, $profile->userId);
        $this->assertEquals($surname, $profile->surname);
        $this->assertEquals($name, $profile->name);
    }
}