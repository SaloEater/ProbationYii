<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 11:44
 */

namespace bookkeeping\services\auth;


use bookkeeping\entities\User;
use bookkeeping\forms\auth\LoginForm;
use bookkeeping\repositories\UserRepository;

class AuthService
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function auth(LoginForm $form): User
    {
        $user = $this->users->getByUsername($form->username);

        if (!$user->validatePassword($form->password) || !$user->isActive()) {
            throw new \DomainException('Undefined password');
        }

        return $user;
    }
}