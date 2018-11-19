<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.11.2018
 * Time: 20:52
 */

namespace bookkeeping\tests\unit\invite;


use Helper\Unit;

class CreateTest extends Unit
{
    public function testSuccess()
    {
        $invite = Invite::create(
            $familyId = 1,
            $secret = 'abcd',
            $createdAt = time()
        );

        $this->assertEquals($familyId, $invite->familyId);
        $this->assertEquals($secret, $invite->secret);
        $this->assertEquals($createdAt, $invite->createdAt);
    }
}