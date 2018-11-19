<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 14.11.2018
 * Time: 10:27
 */

namespace bookkeeping\tests\unit\family;


use bookkeeping\entities\Family;
use Helper\Unit;

class CreateTest extends Unit
{
    public function testSuccess()
    {
        $family = Family::create(
            $familyId = 1,
            $ownerId = 1
        );

        $this->assertEquals($familyId, $family->familyId);
        $this->assertEquals($ownerId, $family->ownerId);
    }
}