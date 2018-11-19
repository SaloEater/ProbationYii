<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12.11.2018
 * Time: 17:39
 */

namespace bookkeeping\tests\unit\account;

use bookkeeping\entities\Account;
use Codeception\Lib\ModuleContainer;
use Helper\Unit;

class WealthManipulationsTest extends Unit
{
    private $account;
    private $userId = -1;
    private $username = 'test_username';
    private $wealth = 1;


    public function __construct(ModuleContainer $moduleContainer, $config = null)
    {
        $this->account = Account::create(
            $this->userId,
            $this->username,
            $this->wealth
        );
        parent::__construct($moduleContainer, $config);
    }

    public function setSuccess()
    {
        $this->account->setWealth($wealth = 5);

        $this->assertEquals($this->wealth, $this->account->wealth);
    }

    public function resetSuccess()
    {
        $this->account->resetWealth();
        $this->wealth = 0;

        $this->assertEquals($this->wealth, $this->account->wealth);
    }

    public function addSuccess()
    {
        $wealth = $this->account->wealth;
        $wealthDiff = 5;
        $this->wealth = $wealth + $wealthDiff;
        $this->account->add($wealthDiff);

        $this->assertEquals($this->wealth, $this->account->wealth);
    }

    public function takeSuccess()
    {
        $wealth = $this->account->wealth;
        $wealthDiff = 5;
        $this->wealth = $wealth - $wealthDiff;
        $this->account->take($wealthDiff);

        $this->assertEquals($this->wealth, $this->account->wealth);
    }


}