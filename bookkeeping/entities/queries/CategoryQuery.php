<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 16.11.2018
 * Time: 19:40
 */

namespace bookkeeping\entities\queries;


use paulzi\nestedsets\NestedSetsQueryTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Query;

class CategoryQuery extends ActiveQuery
{
    use NestedSetsQueryTrait;

}