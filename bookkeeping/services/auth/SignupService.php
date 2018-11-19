<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 08.11.2018
 * Time: 14:57
 */

namespace bookkeeping\services\auth;

use bookkeeping\entities\User;
use bookkeeping\forms\manage\user\SignupForm;

class SignupService
{

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup(SignupForm $form): User
    {
        if (User::findOne(['username' => $form->username])) {
            throw new \DomainException('Username already exists');
        }

        if (User::findOne(['username' => $form->username])) {
            throw new \DomainException('Username already exists');
        }

        $user = User::signup($form->username, $form->email, $form->password);

        if (!$user->save()) {
            throw new \RuntimeException('Saving error');
        }

        return $user;
    }
}