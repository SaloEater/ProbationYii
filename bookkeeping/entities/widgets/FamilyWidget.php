<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 19.11.2018
 * Time: 8:16
 */

namespace bookkeeping\entities\widgets;


use bookkeeping\entities\Family;
use bookkeeping\entities\FamilyMember;
use bookkeeping\repositories\UserRepository;
use yii\base\Widget;

class FamilyWidget extends Widget
{
    /**
     * @var Family $family
     */
    public $family;
    private $members;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->members = $this->family->getAll();
    }

    public function run()
    {
        /**
         * @var FamilyMember $member
         */
        $output = 'Члены семьи: <ul>';
        foreach ($this->members as $i => $member) {
            $output .= '<link>'.(new UserRepository())->get($member->userId)->username;
        }

        return $output.'</ul>';
    }

}