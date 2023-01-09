<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

/**
 * Class LoginCest
 */
class PedidoCest
{
    /**
     * @param FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
    }

    protected function _after(FunctionalTester $I)
    {
    }

    public function createPedido(FunctionalTester $I)
    {
        $I->fillField('input[name="LoginForm[username]"]', 'tiago');
        $I->wait(2);
        $I->fillField('input[name="LoginForm[password]"]', '12345678');
        $I->wait(2);

        $I->submitForm('#login-form',[
            'input[name="LoginForm[username]"]'=>'tiago',
            'input[name="LoginForm[password]"]'=>'12345678'
        ]);
        //Mandar para a página de pedidos
        $I->wait(2);

        $I->click('Pedido');
        $I->wait(3);
        $I->click('Visualizar todos os pedidos');
        $I->wait(3);

        $I->click('Criar Pedido');

        $I->selectOption('select[name="Pedido[tipo_pedido]"]','Restaurante');
        $I->wait(2);
        //$I->fillField('#pedido-profile_id','1');
        $I->executeJS('document.getElementById("pedido-profile_id").value=1');
        $I->wait(2);
        $I->click('Guardar');
        $I->wait(2);

        $I->wait(5);

        //$I->fillField('select[name="Pedido[mesa_id]"]','1');
        $I->executeJS('document.getElementById("pedido-mesa_id").value=1');
        $I->wait(2);
        $I->click('Guardar');
        $I->wait(2);
        $I->executeJS('document.getElementById("linhapedido-artigo_id").value=22');
        $I->wait(2);
        $I->fillField('input[name="Linhapedido[quantidade]"]','10');
        $I->wait(2);
        $I->click('Adicionar Artigo');
        $I->wait(2);

        $I->click('Finalizar Pedido');
        $I->wait(2);
        $I->executeJS('document.getElementById("pedido-metodo_pagamento_id").value=1');
        $I->wait(2);
        $I->click('Guardar');

        $I->wait(5);
    }
}
