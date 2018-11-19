<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 18.11.2018
 * Time: 15:50
 */

namespace bookkeeping\services\manage;


use bookkeeping\repositories\UserRepository;

class UserService
{
    /**
     * @var UserRepository $users
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function remove($id)
    {
        $user = $this->users->get($id);

        $this->users->remove($user);
    }
}