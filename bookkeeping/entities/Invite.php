<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.11.2018
 * Time: 21:27
 */

namespace bookkeeping\entities;


use yii\db\ActiveRecord;

/**
 * Class Invite
 * @package bookkeeping\entities
 * @property int $familyId
 * @property string secret
 * @property int createdAt
 */
class Invite extends ActiveRecord
{
    public static function create($familyId, $secret, $createdAt): self
    {
        $invite = new static();
        $invite->familyId = $familyId;
        $invite->secret = $secret;
        $invite->createdAt = $createdAt;

        return $invite;
    }

    public static function tableName()
    {
        return '{{%invites}}';
    }

}