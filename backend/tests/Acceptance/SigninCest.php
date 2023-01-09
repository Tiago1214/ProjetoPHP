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
        //Submeter formulário para iniciar sessão
        $I->submitForm('#login-form',[
            'input[name="LoginForm[username]"]'=>'tiago',
            'input[name="LoginForm[password]"]'=>'12345678'
        ]);

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

        $I->wait(2);

        $I->click('Artigos');
        $I->wait(2);
        $I->click('Visualizar Artigos');
        $I->wait(2);
        $I->click('Criar Artigo');
        $I->wait(2);

        $I->fillField('input[name="Artigo[nome]"]', 'teste');
        $I->wait(2);
        $I->fillField('input[name="Artigo[descricao]"]','teste de aceitacao');
        $I->wait(2);
        $I->fillField('input[name="Artigo[referencia]"]','234253462');
        $I->wait(2);
        $I->fillField('input[name="Artigo[preco]"]','435');
        $I->wait(2);
        $I->selectOption('select[name="Artigo[iva_id]"]','1');
        $I->wait(2);
        $I->selectOption('select[name="Artigo[categoria_id]"]','Carne');
        $I->wait(2);
        $I->selectOption('select[name="Artigo[estado]"]','1');
        $I->wait(2);
        $I->click('Guardar');
        $I->wait(5);
        //Teste de aceitação concluído
    }
}
