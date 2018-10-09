<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class filmsShowsValidlyCest
{
    private $columns = ['Name', 'Year'];
    private function seeFields(AcceptanceTester $I)
    {
        foreach ($this->columns as $field) {
            $I->see("$field");
        }
    }

    public function _before(AcceptanceTester $I)
    {
        $this->validateCreation($I);
        $this->validateIndexing($I);
    }

    private function validateCreation(AcceptanceTester $I)
    {
        $I->amOnPage('/films/create');
        $I->expect('Title \'Films\' and belongs fields');
        $I->see('Create Films');

        $this->seeFields($I);
    }

    private function validateIndexing(AcceptanceTester $I)
    {
        $I->amOnPage('/films');
        $I->expect('List of films');
        $I->seeElement('.summary');

        $this->seeFields($I);

        $index = $I->grabTextFrom('//table[@class=\'table table-striped table-bordered\']/tbody/tr/td[2]');

        $this->validateUpdating($I, $index);
        $this->validateViewing($I, $index);
    }

    private function validateUpdating(AcceptanceTester $I)
    {
        $I->amOnPage('/films/update?id=1');
        $I->expect('Update interaction window');
        $I->see('Update Films');
        $I->seeElement('.btn.btn-success');

        $this->seeFields($I);
    }

    private function validateViewing(AcceptanceTester $I)
    {
        $I->amOnPage('/films/view?id=1');
        $I->expect('View of chosen element');
        $I->seeElement('.btn.btn-primary');
        $I->seeElement('.btn.btn-danger');

        $this->seeFields($I);
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

    }
}

