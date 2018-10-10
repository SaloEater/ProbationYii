<?php
/**
 * updated by PhpStorm.
 * User: Tom
 * Date: 09.10.2018
 * Time: 21:42
 */

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class ProducersEditsValidlyCest
{

    /**
     * @param $text string
     * @return array
     */
    private function fillProducers($text)
    {
        return ['Producers[name]' => "$text"];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/producers');
        $index = $I->grabTextFrom('//table[@class=\'table table-striped table-bordered\']/tbody/tr/td[2]');
        $I->amOnPage("/producers/update?id=$index");
    }

    public function updateWithEmptyField(FunctionalTester $I)
    {
        $I->see('Update Producers');
        $I->submitForm('button[type=submit]', $this->fillProducers(''));
        $I->seeValidationError('Name cannot be blank.');
    }

    public function updateWithNumericName(FunctionalTester $I)
    {
        $I->see('Update Producers');
        $I->submitForm('button[type=submit]', $this->fillProducers('123'));
        $I->dontSeeValidationError('Name cannot be blank.');
    }

    public function updateWithSymbolicName(FunctionalTester $I)
    {
        $I->see('Update Producers');
        $I->submitForm('button[type=submit]', $this->fillProducers('@!?.,(){}[];:\\\'"$%^&*#'));
        $I->dontSeeValidationError('Name cannot be blank.');
    }

    public function updateWithTextName(FunctionalTester $I)
    {
        $I->see('Update Producers');
        $I->submitForm('button[type=submit]', $this->fillProducers('Random Name'));
        $I->dontSeeValidationError('Name cannot be blank.');
    }
}
