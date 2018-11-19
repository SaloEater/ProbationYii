<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 14.11.2018
 * Time: 10:30
 */

namespace bookkeeping\tests\unit\family;


use bookkeeping\entities\Family;
use Helper\Unit;

class EditOwnerTest extends Unit
{
    public function testSuccess()
    {
        $family = Family::create(
            $familyId = 1,
            $ownerId = 1
        );

        $family->setOwner($ownerId = 5);

        $this->assertEquals($ownerId, $family->ownerId);
    }
}