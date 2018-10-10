<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 09.10.2018
 * Time: 21:42
 */

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class ProducersCreatesValidlyCest
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
        $I->amOnPage('/producers/create');
    }

    public function createWithEmptyField(FunctionalTester $I)
    {
        $I->see('Create Producers');
        $I->submitForm('button[type=submit]', []);
        $I->seeValidationError('Name cannot be blank.');
    }

    public function createWithNumericName(FunctionalTester $I)
    {
        $I->see('Create Producers');
        $I->submitForm('button[type=submit]', $this->fillProducers('123'));
        $I->dontSeeValidationError('Name cannot be blank.');
    }

    public function createWithSymbolicName(FunctionalTester $I)
    {
        $I->see('Create Producers');
        $I->submitForm('button[type=submit]', $this->fillProducers('@!?.,(){}[];:\\\'"$%^&*#'));
        $I->dontSeeValidationError('Name cannot be blank.');
    }

    public function createWithTextName(FunctionalTester $I)
    {
        $I->see('Create Producers');
        $I->submitForm('button[type=submit]', $this->fillProducers('Random Name'));
        $I->dontSeeValidationError('Name cannot be blank.');
    }
}
