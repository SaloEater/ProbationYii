<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:12
 */

namespace bookkeeping\services\manage\bookkeeping;

use bookkeeping\entities\Profile;
use bookkeeping\forms\manage\bookkeeping\ProfileForm;
use bookkeeping\repositories\bookkeeping\ProfileRepository;

class ProfileService
{
    private $profiles;

    public function __construct(ProfileRepository $profiles)
    {
        $this->profiles = $profiles;
    }

    public function create(ProfileForm $form): Profile
    {
        $profile = Profile::create($form->userId, $form->surname, $form->name);
        $this->profiles->save($profile);

        return $profile;
    }

    public function edit(ProfileForm $form)
    {
        $profile = $this->profiles->get($form->userId);
        $profile->edit($form->surname, $form->name);
        $this->profiles->save($profile);
    }

    public function remove($userId)
    {
        $profile = $this->profiles->get($userId);
        $this->profiles->remove($profile);
    }
}