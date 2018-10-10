<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 10.10.2018
 * Time: 15:24
 */

namespace frontend\tests\webdriver;

use frontend\tests\WebdriverTester;

class filmsShowsValidlyCest
{

    public function _before(WebdriverTester $I)
    {

    }

    public function testPopup(WebdriverTester $I)
    {
        $I->amOnPage('/films');
        $I->click('a[title=Delete]');
        $I->seeInPopup('Are you sure you want to delete this item?');
    }
}

