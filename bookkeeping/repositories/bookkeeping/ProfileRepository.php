<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:07
 */

namespace bookkeeping\repositories\bookkeeping;

use bookkeeping\entities\Profile;
use bookkeeping\repositories\IRepository;
use yii\web\NotFoundHttpException;

class ProfileRepository extends IRepository
{
    public function __construct()
    {
        $this->type = Profile::class;
    }

    public function get($userId): Profile
    {
        if (!$profile = $this->getBy(
            ['userId' => $userId]
        )) {
            throw new NotFoundHttpException('Profile is not found');
        }

        return $profile;
    }

    public function save(Profile $profile)
    {
        if (!$profile->save()) {
            throw new \RuntimeException('Profile saving error');
        }
    }

    public function remove(Profile $profile)
    {
        if (!$profile->delete()) {
            throw new \RuntimeException('Profile removing error');
        }
    }
}