<?php

namespace bookkeeping\forms\manage\user;

use yii\base\Model;
use yii\base\InvalidParamException;
use bookkeeping\entities\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
}
