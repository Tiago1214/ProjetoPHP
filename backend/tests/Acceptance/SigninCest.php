<?php


namespace backend\tests\Acceptance;

use backend\tests\AcceptanceTester;

class SigninCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

    public function testes(AcceptanceTester $I){
        $I->amOnPage('http://back.test/site/login');
        $I->fillField('username','tiago');
        $I->fillField('password','12345678');
        $I->click('login-button');

        $I->wait(5);

        $I->amOnPage('pedido/index');
        $I->wait(5);

        $I->amOnPage('pedido/create');
        $I->see('Criar Pedido');

        $I->fillField('pedido[profile_id]','234555111');
        $I->fillField('pedido[mesa_id]','1');
        $I->click('pedido-button');

        $I->wait(5);

        $I->fillField('linhapedido[artigo_id]','teste');
        $I->fillField('linhapedido[quantidade]','1');
        $I->click('artigo-button');

        $I->wait(5);
        $I->amOnPage('site/index');
    }
}
