<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 20:41
 */

namespace bookkeeping\repositories\bookkeeping;


use bookkeeping\entities\Category;
use bookkeeping\repositories\IRepository;

class CategoryRepository extends IRepository
{
    public function __construct()
    {
        $this->type = Category::class;
    }

    public function get($id): Category
    {
        return $this->getBy(['id' => $id]);
    }

    public function save(Category $category)
    {
        if (!$category->save()) {
            throw new \RuntimeException('Category saving error');
        }
    }

    public function remove(Category $category)
    {
        if (!$category->delete()) {
            throw new \RuntimeException('Category saving error');
        }
    }

    public function getFamilyRoot($id): Category
    {
        return $this->getBy([
            'depth' => 0,
            'familyId' => $id,
        ]);
    }
}