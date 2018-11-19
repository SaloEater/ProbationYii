<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 14.11.2018
 * Time: 7:34
 */

namespace bookkeeping\tests\unit\member;


use bookkeeping\entities\FamilyMember;
use Helper\Unit;

class CreateTest extends Unit
{
    public function testSuccess()
    {
        $member = FamilyMember::create(
            $userId = 1,
            $familyId = 1
        );

        $this->assertEquals($userId, $member->userId);
        $this->assertEquals($familyId, $member->familyId);
    }
}