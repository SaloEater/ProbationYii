<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 17:04
 */

namespace bookkeeping\entities;


use bookkeeping\entities\queries\CategoryQuery;
use paulzi\nestedsets\NestedSetsBehavior;
use paulzi\nestedsets\NestedSetsQueryTrait;
use yii\db\ActiveRecord;

/**
 * Class Category
 * @package bookkeeping\entities
 * @property int $id
 * @property int $createdBy
 * @property string $name
 * @property int familyId
 * @property int $createdAt
 * @property int lft
 * @property int rgt
 * @property int depth
 * @property int tree
 *
 * @property Category $parent
 * @mixin NestedSetsBehavior
 */
class Category extends ActiveRecord
{

    public $parentId;

    use NestedSetsQueryTrait;

    public static function create($createdBy, $name, $familyId, $createdAt): self
    {
        //TODO: Добавить familyId во все, что связано с категориями
        $category = new static();
        $category->createdBy = $createdBy;
        $category->name = $name;
        $category->familyId = $familyId;
        $category->createdAt = $createdAt;

        return $category;
    }

    public static function tableName()
    {
        return '{{%categories}}';
    }

    public static function find()
    {
        return new CategoryQuery(static::class);
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function edit($name)
    {
        $this->name = $name;
    }

    public function behaviors()
    {
        return [
            NestedSetsBehavior::class,
        ];
    }

}