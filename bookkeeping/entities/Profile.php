<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 22:13
 */

namespace bookkeeping\entities;

use yii\db\ActiveRecord;

/**
 * @property integer $userId
 * @property string $surname
 * @property string $name
 */
class Profile extends ActiveRecord
{

    public static function create($userId, $surname, $name): self
    {
        $profile = new static();
        $profile->userId = $userId;
        $profile->surname = $surname;
        $profile->name = $name;

        return $profile;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profiles}}';
    }

    public function edit($surname, $name)
    {
        $this->surname = $surname;
        $this->name = $name;
    }
}