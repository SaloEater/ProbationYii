<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 10:24
 */

namespace bookkeeping\services\manage\bookkeeping;


use bookkeeping\entities\Category;
use bookkeeping\entities\Family;
use bookkeeping\repositories\bookkeeping\FamilyRepository;

class FamilyService
{
    /**
     * @var FamilyRepository $families
     */
    private $families;

    public function __construct(FamilyRepository $familyRepository)
    {
        $this->families = $familyRepository;
    }

    public function remove($familyId)
    {
        $family = $this->families->get($familyId);
        $this->families->remove($family);
    }

    public function create($ownerId): Family
    {
        $family = Family::create($ownerId);
        $this->families->save($family);
        $family->createOwner();
        $familyRootCategory = Category::create(
            $ownerId,
            "root_$family->id",
            $family->id,
            time()
        );
        $familyRootCategory->makeRoot()->save();

        return $family;
    }
}