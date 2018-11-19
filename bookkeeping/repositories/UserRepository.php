<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11.11.2018
 * Time: 10:50
 */

namespace bookkeeping\repositories;

use bookkeeping\entities\User;

class UserRepository extends IRepository
{
    public function __construct()
    {
        $this->type = User::class;
    }

    public function getActiveByEmail($email): User
    {
        return $this->getBy([
            'status' => User::STATUS_ACTIVE,
            'email' => $email,
        ]);
    }

    public function existByPasswordResetToken($token): bool
    {
        return (bool)User::findByPasswordResetToken($token);
    }

    public function getByPasswordResetToken($token): User
    {
        return $this->getBy(['password_reset_token' => $token]);
    }

    public function getByUsername($username): User
    {
        return $this->getBy(['username' => $username]);
    }

    public function save(User $user): void
    {
        if (!$user->save()) {
            throw new \DomainException('User saving error');
        }
    }

    public function remove(User $user)
    {
        if (!$user->delete()) {
            throw new \RuntimeException('User removing error');
        }
    }

    public function get($id): User
    {
        return $this->getBy(['id' => $id]);
    }
}