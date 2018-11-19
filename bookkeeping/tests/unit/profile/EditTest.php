<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 22:18
 */

namespace bookkeeping\tests\unit\profile;


use Helper\Unit;

class EditTest extends Unit
{
    public function testSuccess()
    {
        $profile = Profile::create(
            $userId = -1,
            $surname = 'test_surname',
            $name = 'test_name'
        );

        $profile->edit(
            $surname = 'new_surname',
            $name = 'new_name'
        );

        $this->assertEquals($surname, $profile->surname);
        $this->assertEquals($name, $profile->name);
    }
}