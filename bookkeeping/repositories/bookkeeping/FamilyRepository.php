<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 10:24
 */

namespace bookkeeping\repositories\bookkeeping;


use bookkeeping\entities\Family;
use bookkeeping\repositories\IRepository;

class FamilyRepository extends IRepository
{

    public function __construct()
    {
        $this->type = Family::class;
    }

    public function get($familyId): Family
    {
        return $this->getBy([
            'id' => $familyId,
        ]);
    }

    public function getByOwnerId($userId): Family
    {
        return $this->getBy([
            'ownerId' => $userId,
        ]);
    }

    public function save(Family $family)
    {
        if (!$family->save()) {
            throw new \RuntimeException('Family saving error');
        }
    }

    public function remove(Family $family)
    {
        if (!$family->delete()) {
            throw new \RuntimeException('Family removing error');
        }
    }

}