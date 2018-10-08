<?php 

class SigninCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'admin');
        $I->fillField('Password', 'admin1');
        $I->click('Login');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

    }
}
