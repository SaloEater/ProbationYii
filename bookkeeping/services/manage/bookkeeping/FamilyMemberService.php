<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 14.11.2018
 * Time: 7:43
 */

namespace bookkeeping\services\manage\bookkeeping;


use bookkeeping\entities\FamilyMember;
use bookkeeping\repositories\bookkeeping\FamilyMemberRepository;

class FamilyMemberService
{
    /**
     * @var FamilyMemberRepository $members
     */
    private $members;

    public function __construct(FamilyMemberRepository $members)
    {
        $this->members = $members;
    }

    public function remove($userId)
    {
        $member = $this->getById($userId);
        $this->members->remove($member);
    }

    private function getById($userId): FamilyMember
    {
        $member = $this->members->get($userId);

        return $member;
    }

    public function getSomeByFamily($familyId): array
    {
        $members = $this->members->getByFamily($familyId);

        return $members;
    }

    public function create($userId, $familyId): FamilyMember
    {
        $member = FamilyMember::create($userId, $familyId);
        $this->members->save($member);

        return $member;
    }

    public function getFamilyOf($userId): int
    {
        $member = $this->getById($userId);

        return $member->familyId;
    }

    public function exists($userId): bool
    {
        $exists = false;
        try {
            $exists = (bool)$this->getById($userId);
        } catch (\DomainException $e) {

        }

        return $exists;
    }
}