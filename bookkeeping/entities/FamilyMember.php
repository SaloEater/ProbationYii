<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 14.11.2018
 * Time: 7:33
 */

namespace bookkeeping\entities;


use yii\db\ActiveRecord;

/**
 * Class FamilyMember
 * @package bookkeeping\entities
 * @property int $userId
 * @property int $familyId
 */
class FamilyMember extends ActiveRecord
{
    public static function create(int $userId, int $familyId): self
    {
        $member = new static();
        $member->userId = $userId;
        $member->familyId = $familyId;

        return $member;
    }

    public static function tableName()
    {
        return '{{%members}}';
    }

}