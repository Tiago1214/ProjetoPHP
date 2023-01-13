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
        $I->fillField('LoginForm[username]', 'tiago');
        $I->fillField('LoginForm[password]', '12345678');
        $I->click('Iniciar Sessão');

        $I->click('Pedido');

        $I->click('Visualizar todos os pedidos');


        $I->click('Criar Pedido');

        $I->selectOption('Pedido[tipo_pedido]','Restaurante');

        //$I->fillField('#pedido-profile_id','1');
        $I->selectOption('Pedido[profile_id]','1');

        $I->click('Guardar');

        //$I->fillField('select[name="Pedido[mesa_id]"]','1');
        $I->selectOption('Pedido[mesa_id]','1');
        $I->click('Guardar');

        $I->selectOption('Linhapedido[artigo_id]','36');
        $I->fillField('Linhapedido[quantidade]','10');
        $I->click('Adicionar Artigo');

        $I->click('Finalizar Pedido');
        $I->selectOption('Pedido[metodo_pagamento_id]','1');
        $I->click('Guardar');

    }
}
