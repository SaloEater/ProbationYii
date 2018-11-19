<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:04
 */

namespace bookkeeping\forms\manage\bookkeeping;


use bookkeeping\entities\Profile;
use bookkeeping\entities\User;
use yii\base\Model;

class ProfileForm extends Model
{
    public $userId;
    public $surname;
    public $name;

    private $_profile;

    public function __construct(Profile $profile = null, array $config = [])
    {
        if ($profile) {
            $this->userId = $profile->userId;
            $this->surname = $profile->surname;
            $this->name = $profile->name;
            $this->_profile = $profile;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['surname', 'name'], 'required'],
            [['surname', 'name'], 'string', 'max' => 255],
            [['userId'], 'unique', 'targetClass' => User::class],
        ];
    }
}