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

    }

    public function validateCreation(AcceptanceTester $I)
    {
        $I->amOnPage('/films/create');
        $I->expect('Title \'Films\' and belongs fields');
        $I->see('Create Films');

        $this->seeFields($I);
    }

    public function validateIndexing(AcceptanceTester $I)
    {
        $I->amOnPage('/films');
        $I->expect('List of films');
        $I->seeElement('.summary');

        $this->seeFields($I);

        $index = $I->grabTextFrom('//table[@class=\'table table-striped table-bordered\']/tbody/tr/td[2]');

        $this->validateUpdating($I, $index);
        $this->validateViewing($I, $index);
    }

    private function validateUpdating(AcceptanceTester $I, $index)
    {
        $I->amOnPage("/films/update?id=$index");
        $I->expect('Update interaction window');
        $I->see('Update Films');
        $I->seeElement('.btn.btn-success');

        $this->seeFields($I);
    }

    private function validateViewing(AcceptanceTester $I, $index)
    {
        $I->amOnPage("/films/view?id=$index");
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
