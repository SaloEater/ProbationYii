<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 19:43
 */

namespace bookkeeping\forms\manage\bookkeeping;


use bookkeeping\entities\Category;
use yii\base\Model;

class CategoryForm extends Model
{
    public $id;
    public $createdBy;
    public $name;
    public $createdAt;
    public $familyId;

    public $parentId;

    private $_category;

    public function __construct(Category $category = null, array $config = [])
    {
        if ($category) {
            $this->id = $category->id;
            $this->createdAt = $category->createdAt;
            $this->name = $category->name;
            $this->createdBy = $category->createdBy;
            $this->familyId = $category->familyId;
            $this->parentId = $category->parentId;
            $this->_category = $category;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['familyId', 'createdBy', 'createdAt'], 'integer'],
            [['id'], 'unique', 'targetClass' => Category::class],
        ];
    }
}