<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 15.11.2018
 * Time: 22:24
 */

namespace bookkeeping\services\manage\bookkeeping;


use bookkeeping\entities\Family;
use bookkeeping\entities\Invite;
use bookkeeping\forms\manage\bookkeeping\InviteForm;
use bookkeeping\repositories\bookkeeping\FamilyRepository;
use bookkeeping\repositories\bookkeeping\InviteRepository;
use yii\web\NotFoundHttpException;

class InviteService
{
    /**
     * @var InviteRepository $invites
     */
    private $invites;

    public function __construct(InviteRepository $invites)
    {
        $this->invites = $invites;
    }

    public function create(InviteForm $form): Invite
    {
        $invite = $this->invites->getBySecret($form->secret);
        $this->invites->save($invite);

        return $invite;
    }

    public function applyInvite(Invite $invite)
    {
        $families = \Yii::$container->get(FamilyRepository::class);
        /**
         * @var Family $family
         */
        $family = $families->getById($invite->familyId);

        $family->createMember(\Yii::$app->user->id);

        $this->generateSecret($invite);
    }

    public function generateSecret(Invite $invite)
    {
        $length = 16;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $invite->secret = $randomString;
    }
}