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
        //Não sei o porque de o botão de login não funcionar com este link sendo que o id do button submit é este
        $I->click('Login');

        $I->wait(3);

        $I->click('li[id=menu-lateral]');
        $I->wait(3);
        $I->click('li[id=pedido]');
        $I->wait(3);

        $I->click('a[id=criar-pedido]');

        $I->fillField('input[name="Pedido[tipo_pedido]"]','0');
        $I->wait(2);
        $I->fillField('input[name="Pedido[profile_id]"]','1');
        $I->wait(2);
        $I->click('pedido-button');
        $I->wait(2);

        $I->wait(5);

        $I->fillField('input[name="Pedido[mesa_id]"]','1');
        $I->wait(2);
        $I->click('pedido-mesa-button');
        $I->wait(2);
        $I->fillField('input[name="Linhapedido[artigo_id]"','1');
        $I->wait(2);
        $I->fillField('input[name="Linhapedido[quantidade]"]','10');
        $I->wait(2);
        $I->click('finalizar-pedido');
        $I->wait(2);

        $I->fillField('input[name="Pedido[metodo_pagamento_id]"]','1');
        $I->wait(2);
        $I->click('pedido-mesa-button');

        $I->wait(2);
        //Teste de aceitação concluído
    }
}
