<?php


namespace backend\tests\Acceptance;

use backend\tests\AcceptanceTester;

class SigninCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/site/login');
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    public function testes(AcceptanceTester $I){
        $I->fillField('input[name="LoginForm[username]"]', 'tiago');
        $I->wait(2);
        $I->fillField('input[name="LoginForm[password]"]', '12345678');
        $I->wait(2);
        $I->click('submitbutton[id=login-button]');

        $I->wait(3);

        $I->click('li[id=button-pedido]');
        $I->wait(3);
        $I->click('a[id=pedido]');
        $I->wait(3);

        $I->see('Criar Pedido');

        $I->fillField('input[name="w0[profile_id]"]','234555111');
        $I->fillField('input[name="w0[mesa_id]"]','1');
        $I->click('pedido-button');

        $I->wait(5);

        $I->fillField('input[name="w1[artigo_id]"]','teste');
        $I->fillField('input[name="w1[quantidade]"]','1');
        $I->click('artigo-button');

        $I->wait(5);
        $I->amOnPage('site/index');


    }
}
