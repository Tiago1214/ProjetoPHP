<?php


namespace backend\tests\Acceptance;

use backend\tests\AcceptanceTester;

class SigninCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('http://back.test/site/login');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    public function try(AcceptanceTester $I){
        $I->wait(100);

    }
}
