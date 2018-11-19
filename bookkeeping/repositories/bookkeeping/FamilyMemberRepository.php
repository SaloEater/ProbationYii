<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 14.11.2018
 * Time: 7:47
 */

namespace bookkeeping\repositories\bookkeeping;


use bookkeeping\entities\FamilyMember;
use bookkeeping\repositories\IRepository;
use yii\web\NotFoundHttpException;

class FamilyMemberRepository extends IRepository
{

    public function __construct()
    {
        $this->type = FamilyMember::class;
    }

    public function existUserId($userId): bool
    {
        $exists = true;
        try {
            $this->get($userId);
        } catch (\DomainException $e) {
            $exists = false;
        }

        return $exists;
    }

    public function get($userId): FamilyMember
    {
        return $this->getBy([
            'userId' => $userId,
        ]);
    }

    public function saveSome(array $members)
    {
        foreach ($members as $member) {
            $this->save($member);
        }
    }

    public function save(FamilyMember $familyMember)
    {
        if (!$familyMember->save()) {
            throw new \RuntimeException('Member saving error');
        }
    }

    public function remove(FamilyMember $familyMember)
    {
        if (!$familyMember->delete()) {
            throw new \RuntimeException('Member removing error');
        }
    }

    public function getByFamily($familyId): array
    {
        $members = $this->getSome([
            'familyId' => $familyId,
        ]);

        return $members;
    }

}