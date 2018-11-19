<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 20:40
 */

namespace bookkeeping\services\manage\bookkeeping;


use bookkeeping\entities\Category;
use bookkeeping\forms\manage\bookkeeping\CategoryForm;
use bookkeeping\repositories\bookkeeping\CategoryRepository;

class CategoryService
{

    /**
     * @var CategoryRepository $categories
     */
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function create(CategoryForm $form): Category
    {
        $parent = $this->categories->get($form->parentId);
        $category = Category::create(
            $form->createdBy,
            $form->name,
            $form->familyId,
            $form->createdAt
        );
        $category->appendTo($parent);
        $this->categories->save($category);

        return $category;
    }

    public function edit($id, CategoryForm $form)
    {
        $category = $this->categories->get($id);

        $category->edit($form->name);
        $this->categories->save($category);
    }

    public function removeById($id)
    {
        $category = $this->categories->get($id);
        $this->remove($category);
    }

    public function remove(Category $category)
    {
        $this->assertIsNotRoot($category);
        $this->categories->remove($category);
    }

    private function assertIsNotRoot(Category $category)
    {
        if ($category->isRoot()) {
            throw new \DomainException('Unable to manage root category');
        }
    }

    public function getFamilyRoot($id): Category
    {
        return $this->categories->getFamilyRoot($id);
    }

    public function createHandmaded($createdBy, $name, $familyId, $parentId): Category
    {
        $parent = $this->categories->get($parentId);
        $category = Category::create(
            $createdBy,
            $name,
            $familyId,
            time()
        );
        $category->appendTo($parent);
        $this->categories->save($category);

        return $category;
    }

}