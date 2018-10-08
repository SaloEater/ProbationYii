<?php 

class producersShowsValidlyCest
{
    private $columns = ['Name'];
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
        $I->amOnPage('/producers/create');
        $I->expect('Title \'Producers\' and belongs fields');
        $I->see('Create Producers');

        $this->seeFields($I);
    }

    private function validateIndexing(AcceptanceTester $I)
    {
        $I->amOnPage('/producers');
        $I->expect('List of producers');
        $I->seeElement('.summary');

        $this->seeFields($I);

        $index = $I->grabTextFrom('//table[@class=\'table table-striped table-bordered\']/tbody/tr/td[2]');

        $this->validateUpdating($I, $index);
        $this->validateViewing($I, $index);
    }

    private function validateUpdating(AcceptanceTester $I, $index)
    {
        $I->amOnPage("/producers/update?id=$index");
        $I->expect('Update interaction window');
        $I->see('Update Producers');
        $I->seeElement('.btn.btn-success');

        $this->seeFields($I);
    }

    private function validateViewing(AcceptanceTester $I, $index)
    {
        $I->amOnPage("/producers/view?id=$index");
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
