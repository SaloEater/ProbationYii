<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.11.2018
 * Time: 20:56
 */

namespace bookkeeping\tests\unit\invite;


use Helper\Unit;

class SecretChangedTest extends Unit
{
    public function testSuccess()
    {
        $invite = Invite::create(
            $familyId = 1,
            $secret = 'abcd',
            $createdAt = time()
        );

        (new InviteService())->changeSecret($invite);

        $this->assertNotEquals($secret, $invite->secret);
    }
}