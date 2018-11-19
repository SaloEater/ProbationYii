<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 14.11.2018
 * Time: 10:32
 */

namespace bookkeeping\tests\unit\family;


use bookkeeping\entities\Family;
use bookkeeping\entities\FamilyMember;
use bookkeeping\entities\Profile;
use Codeception\Lib\ModuleContainer;
use Helper\Unit;

class MembersManipulationsTest extends Unit
{
    /**
     * @var Family $family
     */
    private $family;

    private $ownerId,
        $familyId;

    public function __construct(ModuleContainer $moduleContainer, $config = null)
    {
        $family = Family::create(
            $familyId = 1,
            $ownerId = 1
        );
        parent::__construct($moduleContainer, $config);
    }

    public function addMemberSuccess()
    {

        $this->family->createMember($userId = 2);

        $this->assertCount(1, $this->family->members);
    }

    public function removeMemberByIdSuccess()
    {
        $this->family->removeMember(2);

        $this->assertCount(0, $this->family->members);
    }

    public function fillByExistingMembersSuccess()
    {
        $members = [];
        $members[] = FamilyMember::create(2, $this->familyId);
        $members[] = FamilyMember::create(3, $this->familyId);

        $this->family->loadMembers($members);

        $this->assertCount(2, $this->family->members);
    }

    public function removeAllMembersSuccess()
    {
        $this->family->removeAll();

        $this->assertCount(0, $this->family->members);
    }

}