<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.11.2018
 * Time: 22:24
 */

namespace bookkeeping\repositories\bookkeeping;


use bookkeeping\entities\Invite;
use bookkeeping\repositories\IRepository;

class InviteRepository extends IRepository
{
    public function __construct()
    {
        $this->type = Invite::class;
    }

    public function getByFamily($familyId): Invite
    {
        return $this->getBy([
            'familyId' => $familyId,
        ]);
    }

    public function getBySecret($secret): Invite
    {
        return $this->getBy([
            'secret' => $secret,
        ]);
    }

    public function save(Invite $invite)
    {
        if (!$invite->save()) {
            throw new \RuntimeException('Invite saving error');
        }
    }

    public function remove(Invite $invite)
    {
        if (!$invite->delete()) {
            throw new \RuntimeException('Invite removing error');
        }
    }
}